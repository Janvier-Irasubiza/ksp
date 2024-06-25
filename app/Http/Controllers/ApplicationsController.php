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

class ApplicationsController extends Controller
{
    public function apply():view {
        return view('apply');
    }

    public function submit_app(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string',
            'edu_level' => 'required|string',
            'ap_letter' => 'required|file|mimes:pdf|max:2048',
            'certificate' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'confirm' => 'required|string',
            'place' => 'required|string',
            'receipt' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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

        try {
            $application = Application::create($data);
            return redirect()->route('applied');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to submit application.']);
        }
    }

    public function applied():view {
        return view('feedback');
    }
}
