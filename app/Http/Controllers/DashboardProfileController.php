<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function edit()
    {
        return view('dashboard.profile.edit');
    }

    public function update_profile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
        ]);

        User::where('id', auth()->user()->id)
                ->update($validatedData);

        return redirect('/profile')->with('success', 'Profile has been updated!');
    }

    public function change_password()
    {
        return view('dashboard.profile.change_password');
    }

    public function update_password(Request $request)
    {
        $validatedData = $request->validate([
            'password_old' => 'required|current_password',
            'password' => 'required|min:4|max:12|confirmed',
            'password_confirmation' => 'required_with:password|same:password'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $toUpdate = [
            'password' => $validatedData['password']
        ];
        User::where('id', auth()->user()->id)
                ->update($toUpdate);

        return redirect('/profile')->with('success', 'Password has been updated!');
    }
}
