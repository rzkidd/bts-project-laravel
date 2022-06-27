<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RecentActivity;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class DashboardProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function show(User $profile)
    {
        return view('dashboard.profile.show', [
            'profile' => $profile
        ]);
    }

    public function edit(User $profile)
    {
        return view('dashboard.profile.edit');
    }

    public function update_profile(Request $request, User $profile)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'alamat' => 'required|max:255',
            'no_hp' => 'required',
        ]);

        User::where('id', $profile->id)
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

    public function destroy(User $operator)
    {
        // Record activity
        $id = DB::select("select name from users where id = $operator->id");
        $activity = [
            'user_id' => auth()->user()->id,
            'action' => 'edit',
            'object' => 'monitoring on ' . $id[0]->name
        ];

        RecentActivity::create($activity);
        
        User::destroy($operator->id);

        return redirect('/operator');
    }
}
