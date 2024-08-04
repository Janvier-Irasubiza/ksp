<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Application;
use App\Models\User;
use App\Mail\AppReceived;
use App\Mail\AppApproved;
use App\Mail\AppDenied;
use App\Mail\ClientNotAvailable;
use Mail;

class ApplicationsController extends Controller
{
    public function apply():view {
        return view('apply');
    }

    public function admin_apply():view {
        return view('admin.apply');
    }

    public function submit_app(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string',
            'edu_level' => 'required|string',
            'ap_letter' => 'required|file|mimes:pdf,docx,doc|max:2048',
            'certificate' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'confirm' => 'required|string',
            'place' => 'required|string',
            'receipt' => 'required|image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Handle file uploads
        if ($request->hasFile('ap_letter')) {
            $apLetter = $request->file('ap_letter');
            $apLetterName = time() . '-' . $apLetter->getClientOriginalName();
            $apLetterPath = $apLetter->move(public_path('files'), $apLetterName);
        }

        if ($request->hasFile('certificate')) {
            $certificate = $request->file('certificate');
            $certificateName = time() . '-' . $certificate->getClientOriginalName();
            $certificatePath = $certificate->move(public_path('files'), $certificateName);
        }

        if ($request->hasFile('receipt')) {
            $receipt = $request->file('receipt');
            $receiptName = time() . '-' . $receipt->getClientOriginalName();
            $receiptPath = $receipt->move(public_path('files'), $receiptName);
        }

        // Prepare data to store in the database
        $data = [
            'names' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'course' => $request->input('course'),
            'edu_level' => $request->input('edu_level'),
            'app_letter' => isset($apLetterPath) ? '/files/' . $apLetterName : null,
            'certificate' => isset($certificatePath) ? '/files/' . $certificateName : null,
            'first_time' => $request->input('confirm'),
            'place' => $request->input('place'),
            'receipt' => isset($receiptPath) ? '/files/' . $receiptName : null,
        ];

        if ($request->has('promo_code')) {
            $data['promo_code'] = $request->input('promo_code');
            $data['agent_part'] = 1000;
        } 

        try {
            $application = Application::create($data);

            Mail::to($request->input('email'))->send(new AppReceived(
                $request->input('names'),
                null,
                'ksprwanda@gmail.com',
                '+250 785 478 665',
            ));
    
            if(!Auth::user()) {
                return redirect()->route('applied');
            } else {
                return back()->with('status', 'Application successfully submitted!');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to submit application.']);
        }
    }

    public function applied():view {
        return view('feedback');
    }

    public function mt_applied():view {
        return view('mt-feedback');
    }

    public function app_info(Request $request): View {
        $app = Application::where('app_id', $request->app)->first();

        $pattern = '/^\/files\/\d+-/';

        $ac_docs = preg_replace($pattern, '', $app->certificate, 1);
        $app_letter = preg_replace($pattern, '', $app->app_letter, 1);
        $receipt = preg_replace($pattern, '', $app->receipt, 1);

        $agent = null;
        if ($app->promo_code != "") {
            $agent = User::where('promo_code', $app->promo_code)->first();
        }

        return view('admin.app-info', compact('app', 'receipt', 'agent', 'ac_docs', 'app_letter'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'names' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string',
            'edu_level' => 'required|string',
            'confirm' => 'required|string',
            'place' => 'required|string',
        ]);
    
        try {
            $myTalent = Application::where('app_id', $id)->first();
    
            if (!$myTalent) {
                return redirect()->back()->withInput()->with(['error' => 'Application not found.']);
            }
    
            $myTalent->update($validatedData);
    
            return back()->with('status', 'Application information updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Update failed: ' . $e->getMessage());
    
            return redirect()->back()->withInput()->with(['error' => 'Failed to update application.']);
        }
    }

    public function approve_app(Request $request) {
        $app = Application::where('app_id', $request->app)->first();
    
        if ($app) {
            $app->status = "Approved";

            if ($app->promo_code) {
                $app->agent_part = 700;
            }    

            $app->unavailable = null;
            $app->save();

            Mail::to($app->email)->send(new AppApproved(
                $app->names,
                'My Talent',
                'ksprwanda@gmail.com',
                '+250 785 478 665',
            ));
            
            return back();
        } else {
            return back()->with('error_sending', 'Application not found.');
        }
    }

    public function deny(Request $request, $app) {
        $application = Application::where('app_id', $app)->first();

        if ($application) {
            $application->status = "Denied";
            $application->note = $request->reason;
            $application->save();

            Mail::to($application->email)->send(new AppDenied(
                $application->names,
                'My Talent',
                $request->reason,
                'ksprwanda@gmail.com',
                '+250 785 478 665',
            ));

            return back()->with('sent', 'Email sent to the client informing about the denial.');

        } else {
            return back()->with('error_sending', 'Application not found.');
        }
    }

    public function unreachable(Request $request) {
        $application = Application::where('app_id', $request->app)->first();
        
        if ($application) {

            $application->unavailable = 'yes';
            $application-> save();
        
            Mail::to($application->email)->send(new ClientNotAvailable(
                $application->names,
                'ksprwanda@gmail.com',
                '+250 785 478 665',
            ));

            return back()->with('sent', 'Email sent to the client informing them that they were not available.');
        } else {
            return back()->with('error_sending', 'Application not found.');
        }
    }
}
