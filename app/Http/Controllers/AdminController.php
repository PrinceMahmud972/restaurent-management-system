<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user() {
        $users = User::all();
        return view('admin.user',[
            'users' => $users
        ]);
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }
}
