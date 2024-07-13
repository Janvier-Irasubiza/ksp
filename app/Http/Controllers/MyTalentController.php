<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\MyTalent;
use App\Models\User;
use App\Mail\AppReceived;
use App\Mail\AppApproved;
use App\Mail\AppDenied;
use App\Mail\ClientNotAvailable;
use Mail;
use Auth;

class MyTalentController extends Controller
{
    public function apply_form() : View {

        $provinces = [
            'City of Kigali' => ['Nyarugenge', 'Kicukiro', 'Gasabo'],
            'Eastern Province' => ['Nyagatare', 'Gatsibo', 'Kayonza', 'Rwamagana', 'Bugesera', 'Ngoma', 'Kirehe'],
            'Northern Province' => ['Rulindo', 'Gakenke', 'Musanze', 'Burera', 'Gicumbi'],
            'Southern Province' => ['Kamonyi', 'Muhanga', 'Ruhango', 'Nyanza', 'Huye', 'Nyamagabe', 'Gisagara', 'Nyaruguru'],
            'Western Province' => ['Nyamasheke', 'Rusizi', 'Karongi', 'Ngororero', 'Rutsiro', 'Rubavu', 'Nyabihu'],
        ];

        return view('mytalent.apply', compact('provinces'));
    }

    public function mytalent_apply() : view {

        $provinces = [
            'City of Kigali' => ['Nyarugenge', 'Kicukiro', 'Gasabo'],
            'Eastern Province' => ['Nyagatare', 'Gatsibo', 'Kayonza', 'Rwamagana', 'Bugesera', 'Ngoma', 'Kirehe'],
            'Northern Province' => ['Rulindo', 'Gakenke', 'Musanze', 'Burera', 'Gicumbi'],
            'Southern Province' => ['Kamonyi', 'Muhanga', 'Ruhango', 'Nyanza', 'Huye', 'Nyamagabe', 'Gisagara', 'Nyaruguru'],
            'Western Province' => ['Nyamasheke', 'Rusizi', 'Karongi', 'Ngororero', 'Rutsiro', 'Rubavu', 'Nyabihu'],
        ];
        return view('agents.mytalent-apply', compact('provinces'));
    }

    public function mytalent_submit_app(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'district' => 'required|string|max:255',
            'talent_class' => 'required|string|in:Solo,Group',
            'talent_category' => 'required|string',
            'location' => 'required|string|in:Eastern province,Western province,Northern Province,Southern Province,Kigali city',
            'group_app' => 'required_if:talent_class,Group|file|mimes:pdf,xlsx,doc,docx|max:10240',
            'category_desc' => 'required|string|max:500',
            'receipt' => 'required|file|mimes:pdf,jpeg,png,jpg|max:10240',
        ]);
    
        try {
            // Handle file uploads
            $apLetterPath = null;
            if ($request->hasFile('group_app')) {
                $apLetter = $request->file('group_app');
                $apLetterName = time() . '-' . $apLetter->getClientOriginalName();
                $apLetterPath = $apLetter->move(public_path('files'), $apLetterName);
            }
    
            $receiptPath = null;
            if ($request->hasFile('receipt')) {
                $receipt = $request->file('receipt');
                $receiptName = time() . '-' . $receipt->getClientOriginalName();
                $receiptPath = $receipt->move(public_path('files'), $receiptName);
            }
    
            $data = [
                'names' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'birthdate' => $request->input('birthdate'),
                'district' => $request->input('district'),
                'talent_class' => $request->input('talent_class'),
                'talent_category' => $request->input('talent_category'),
                'location' => $request->input('location'),
                'group_app_sheet' => $apLetterPath ? '/files/' . $apLetterName : null,
                'receipt' => $receiptPath ? '/files/' . $receiptName : null,
                'other_talent' => $request->input('other_talent'),
                'category_desc' => $request->input('category_desc'),
            ];

            if ($request->has('promo_code')) {
                $data['promo_code'] = $request->input('promo_code');
                $data['agent_part'] = 1000;
            }    
    
            MyTalent::create($data);

            Mail::to($request->input('email'))->send(new AppReceived(
                $request->input('name'),
                'My Talent',
                'ksprwanda@gmail.com',
                '+250 785 478 665',
            ));
    
            if(!Auth::user()) {
                return redirect()->route('applied');
            } else {
                return back()->with('status', 'Application submitted successfully');
            }
            
        } catch (\Exception $e) {
            \Log::error('Application submission failed: ' . $e->getMessage());
            return redirect()->back()->withInput()->with(['error' => 'Failed to submit application.']);
        }
    }

    public function app_info(Request $request): View {
        $app = MyTalent::where('app_id', $request->app)->first();

        $pattern = '/^\/files\/\d+-/';

        $group_app_sheet = preg_replace($pattern, '', $app->group_app_sheet, 1);
        $receipt = preg_replace($pattern, '', $app->receipt, 1);

        $agent = null;
        if ($app->promo_code != "") {
            $agent = User::where('promo_code', $app->promo_code)->first();
        }

        return view('admin.mytalent-app', compact('app', 'group_app_sheet', 'receipt', 'agent'));
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'names' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'birthdate' => 'required|date',
            'district' => 'required|string',
            'talent_class' => 'required|string|in:Solo,Group',
            'talent_category' => 'required|string',
            'other' => 'nullable|string',
            'location' => 'required|string',
            'category_desc' => 'required|string',
        ]);
    
        try {
            $myTalent = MyTalent::where('app_id', $id)->first();
    
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
    
    
    public function mytalent_approve_app(Request $request) {
        $app = MyTalent::where('app_id', $request->app)->first();
    
        if ($app) {
            $app->status = "Approved";

            if ($app->promo_code) {
                $app->agent_part = 1000;
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
        $application = MyTalent::where('app_id', $app)->first();

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
        $application = MyTalent::where('app_id', $request->app)->first();
        
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

    public function delete($app) {
        MyTalent::delete($app);
        return back()->with('deleted', 'Application successfully deleted');
    } 
    
}
