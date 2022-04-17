<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    public function foodMenu() {
        $foods = Food::all();
        
        return view('admin.foodmenu', ['foods' => $foods]);
    }

    public function uploadFood(Request $request) {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required'
        ]);

        // upload the image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/images'), $imageName);

        $food = new Food();
        $food->title = $request->title;
        $food->price = $request->price;
        $food->image = $imageName;
        $food->description = $request->description;
        $food->save();

        return redirect()->back();
    }

    public function deleteFood($id) {
        $food = Food::find($id);
        $imageName = $food->image;
        if($food->delete()){
            $image = public_path("assets/images/") . $imageName;
            if(File::exists($image)) {
                File::delete($image);
            }
        }
        return redirect()->back();
    }
}
