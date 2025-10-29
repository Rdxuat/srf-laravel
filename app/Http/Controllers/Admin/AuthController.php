<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\LogHistory;

class AuthController extends Controller
{
    public function index_login()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $status = Auth::attempt($credentials) ? 1 : 0;
        LogHistory::create([
            'email' => $request->input('email'),
            'status' => $status,
            'ip_address' => $request->ip(),
            'device' => $request->header('User-Agent'),
        ]);

        if ($status === 1) {
            $request->session()->regenerate();
            return redirect()->intended('/aos/dashboard')->with('success', 'Login successful.');
        }

        return back()->withInput()->with('error', 'Invalid email or password.');
    }

    public function accountSettings()
    {
        $content['title'] = "Account Settings";
        $content['heading'] = "Change Password";
        return view('admin.account-settings', $content);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Current password is required.',
            'new_password.required' => 'New password is required.',
            'new_password.min' => 'New password must be at least 8 characters.',
            'new_password.confirmed' => 'New password confirmation does not match.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Your current password is incorrect.']);
        }

        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors(['new_password' => 'New password cannot be the same as the current password.'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        // Logout the user after password change
        Auth::logout();

        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Password changed successfully. Please login again.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    public function test(){
        return "Hello";
    }

}
