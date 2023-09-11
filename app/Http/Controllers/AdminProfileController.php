<?php

namespace App\Http\Controllers;

use App\AdminProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    /**
     * Display the authenticated admin's profile.
     *
     * @return JsonResponse
     */
    public function showProfile(): JsonResponse
    {
        $adminProfile = Auth::user()->profile;

        return response()->json(['data' => $adminProfile]);
    }

    /**
     * Update the authenticated admin's profile.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function updateProfile(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admin_profiles,email,' . Auth::id(),
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'phone' => 'nullable|string|max:255',
            'roles' => 'nullable|array',
            'permissions' => 'nullable|array',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $adminProfile = Auth::user()->profile;
        $adminProfile->update($request->all());

        return response()->json(['message' => 'Profile updated successfully']);
    }
}
