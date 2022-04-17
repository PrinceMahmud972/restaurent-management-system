<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $foods = Food::all();
        return view('home', [
            'foods' => $foods
        ]);
    }

    public function redirects() {

        $user_type = Auth::user()->user_type;

        if($user_type == '1') {
            return view('admin.adminhome');
        } else {
            $foods = Food::all();
            return view('home', ['foods' => $foods]);
        }

    }
}
