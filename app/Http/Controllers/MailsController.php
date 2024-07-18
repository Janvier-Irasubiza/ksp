<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Mail\SetPassword;
use Str;
Use Mail;
use Carbon\Carbon;
use DB;

class MailsController extends Controller
{
    public function set_password_mail(Request $request) {

        $token = Str::random(60);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email, 
            'token' => Hash::make($token), 
            'created_at' => Carbon::now()
        	]);

        $passwordResetLink = url(route('set-password', ['token' => $token, 'email' => $request->email]));

        Mail::to($request->email)->send(new SetPassword(
            $request->name,
            $request->promo_code,
            $passwordResetLink,
            'ksprwanda@gmail.com',
            '+250 785 478 665',
        ));

        return back() -> with('status', 'Email successfully sent!');

    }
}
