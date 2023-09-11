<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLogoutController extends Controller
{
    /**
     * Handle an admin logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        // return redirect()->route('admin.login')->with('success', 'Admin logged out successfully.');
        return response()->json([
            'success' => true,
            'message' => 'Admin logged out successfully.',
        ]);
    }
}
