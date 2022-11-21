<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    // manager profile
    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.index', compact('user'));
    }

    // manager account settings
    public function settings()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile.settings', compact('user'));
    }

    // manager account info edit
    public function editProfile(Request $request)
    {
        $this->validateRequest($request);
        $data = [
            'name' => $request->adminName,
            'email' => $request->adminEmail,
            'gender' => $request->adminGender,
        ];
        if ($request->file('adminPhoto')) {
            $oldPhoto = User::where('id', Auth::user()->id)->pluck('profile_photo_path')->first();
            if ($oldPhoto) {
                Storage::delete('public/' . $oldPhoto);
            }
            $newPhoto = uniqid() . "_" . $request->file('adminPhoto')->getClientOriginalName();
            $request->file('adminPhoto')->storeAs('public', $newPhoto);
            $data['profile_photo_path'] = $newPhoto;
        }
        User::where('id', Auth::user()->id)->update($data);
        return redirect()->route('admin.profile');
    }

    // change password for manager account
    public function changePassword(Request $request)
    {
        $this->passwordInputValidation($request);
        $hashedCurrentValue = User::where('id', Auth::user()->id)->pluck('password')->first();
        if (Hash::check($request->currentPassword, $hashedCurrentValue)) {
            User::where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->newPassword)
            ]);
            return redirect()->route('admin.profile');
        } else {
            return back()->with(['passwordWrong' => 'The credetials do not match!']);
        }
    }

    // password validation process
    private function passwordInputValidation($request)
    {
        Validator::make($request->all(), [
            'currentPassword' => 'required',
            'newPassword' => ['required', Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()],
            'confirmPassword' => 'required|same:newPassword'
        ])->validate();
    }

    // validation admin info
    private function validateRequest($request)
    {
        Validator::make($request->all(), [
            'adminName' => 'required',
            'adminEmail' => 'required',
        ])->validate();
    }
}
