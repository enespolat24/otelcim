<?php
namespace App\Http\Controllers;

use App\Models\Rezervasyon;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

Class UserController extends Controller{

public function profilGuncelle()
{
    $user = Auth::user();

    return view('profil-guncelle-form', compact('user'));
}
public function changePasswordPost(Request $request)
{
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Your current password does not matches with the password.");
    }

    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
        // Current password and new password same
        return redirect()->back()->with("error","New Password cannot be same as your current password.");
    }

    $validatedData = $request->validate([
        'current-password' => 'required',
        'new-password' => 'required|string|min:8|confirmed',
    ]);

    //Change Password
    $userId = Auth::user()->id;
    $user = User::find($userId);
    $user->password = bcrypt($request->get('new-password'));
    $user->save();

    return redirect()->back();
}

public function changeName(Request $request)
{
    $userId = Auth::user()->id;
    $user = User::find($userId);
    $user->name = $request->get('name');
    return redirect()->back();
}

}
