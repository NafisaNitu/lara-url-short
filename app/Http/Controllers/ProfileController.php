<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        return view('dashboard.profile');
    }

    public function update(Request $request)
    {
        $this>$this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);

        $user = User::findOrFail(auth()->id());

        $user->update($request->only([
            'name', 'email'
        ]));
    }

    public function changePasswordPage()
    {
        return view('dashboard.change-password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|max:24|confirmed',
            'old_password' => 'required|string|max:24'
        ]);

        $user = User::find(auth()->id());

        if (Hash::check($request->old_password, $user->password)){
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return response()->json(['message'=>'Password updated succssfully']);
        } else {
            return response()->json(['error'=>'Whops! Old password does not match!!']);
        }
    }


}
