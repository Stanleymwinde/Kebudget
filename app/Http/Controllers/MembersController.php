<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MembersController extends Controller
{
    public function showUsers()
    {
        $users = User::latest()->get();

        return view('admin.users.show', compact('users'));
    }

    public function createUser(Request $request, $user)
    {
        $user = User::find($user);

        if ($user->status == 0) {
            $user->status = 1;
        } else {
            $user->status = 0;
        }

        $user->save();


        return redirect(route('dashboard.showUsers'))->with('success', ' Edited Successfully');
    }
}
