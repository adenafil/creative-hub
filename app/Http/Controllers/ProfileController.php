<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Ramsey\Uuid\Nonstandard\Uuid;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        \Illuminate\Support\Facades\Log::debug('Tesdfsdst log message');
        Log::debug('Request data: ', $request->all());

        $data = $request->only(['username', 'user_avatar', 'email']);
        $user = Auth::user();

        Log::info('Authenticated user: ', ['id' => $user->id, 'email' => $user->email]);

        if ($request->hasFile('user_avatar')) {
            $avatarFile = $data['user_avatar'];
            $avatarName = Uuid::uuid5(Uuid::NAMESPACE_DNS, time() . "profile_") . '.' . $avatarFile->getClientOriginalExtension();

            try {
                Log::info('Storing avatar: ' . $avatarName);
                $avatarFile->storeAs("/profile/pictures/" . $user->id , $avatarName , 'local');
                $data['user_avatar'] = $avatarName;
            } catch (Exception $e) {
                Log::error('Failed to upload image: ' . $e->getMessage());
                return back()->withErrors(['image' => 'Failed to upload image: ' . $e->getMessage()]);
            }
        } else {
            unset($data['user_avatar']);
        }

        try {
            Log::debug('Updating user with data: ', $data);
            $user->update([
                'username' => $data['username'],
                'email' => $data['email']
            ]);
        } catch (Exception $e) {
            Log::debug('Failed to update user: ' . $e->getMessage());
            return back()->withErrors(['user' => 'Failed to update user: ' . $e->getMessage()]);
        }

        $userDetails = $user->user_detail;
        if ($userDetails && isset($avatarName)) {
            $userDetails->image_url = Auth::user()->id . "/" . $avatarName;
            try {
                Log::debug('Updating user details with image_url: ' . $avatarName);
                $userDetails->save();
            } catch (Exception $e) {
                Log::error('Failed to update user details: ' . $e->getMessage());
                return back()->withErrors(['user_details' => 'Failed to update user details: ' . $e->getMessage()]);
            }
        }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
