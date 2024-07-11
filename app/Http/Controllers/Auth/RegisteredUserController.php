<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\SetPassword;
use Str;
Use Mail;
use Carbon\Carbon;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View {
        return view('auth.register');
    }

    public function agent_form(): View {
        return view('auth.new');
    }

    public function set_pass_form(Request $request) : View {
        return view('auth.set-password',  ['request' => $request]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function new_agent(Request $request): RedirectResponse {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:15'],
            'promo_code' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'promo_code' => $request->promo_code,
            'address' => $request->address,
            'type' => 'AGT',
        ]);

        event(new Registered($user));

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

        return back() -> with('status', 'Account successfully created');
    }
}
