<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile() {
        return view('profile');
    }

    public function uploadAvatar(Request $request) {
      $request->validate([
         'file'  => 'required|mimes:jpg,jpeg,png|max:2048',
       ]);
      $name = time() . '.' . $request->file->extension();
      $request->file->move(public_path('uploads'), $name);
      $user = Auth::user();
      $user->avatar = "/uploads/" . $name;
      $user->save();
      return redirect('/profile');
    }
}
