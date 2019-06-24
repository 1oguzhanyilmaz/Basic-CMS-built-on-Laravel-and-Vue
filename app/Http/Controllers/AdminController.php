<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanUserRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

//    public function index()
//    {
//        if (request()->user()->hasRole('admin')) {
//            return view('admin.dashboard');
//        }
//
//        if (request()->user()->hasRole('user')) {
//            return redirect('/home');
//        }
//    }

    public function banUser($id, BanUserRequest $request)
    {
        $request->banUser($id);

        //Go back with message
        return back()->with('Message', 'User has been banned');
    }
}
