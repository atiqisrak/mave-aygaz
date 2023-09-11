<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use App\Models\Admin;

class AdminRegisterController extends Controller
{
    /**
     * Show the admin registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    /**
     * Handle an incoming registration request for admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        //return $request->all();
        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($admin) {
            // You can automatically log in the newly registered admin here if needed
            // auth('admin')->login($admin);
            // return redirect()->route('admin.login')->with('success', 'Admin registered successfully. You can now log in.');
            return response()->json([
                'success' => true,
                'message' => 'Admin registered successfully. You can now log in.',
            ]);
        }

        throw ValidationException::withMessages([
            'registration_error' => 'Admin registration failed. Please try again.',
        ]);
    }
}
