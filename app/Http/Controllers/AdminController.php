<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminlogin(Request $request)
    {
        $request->validate([
            'emailx'                => 'required',
            'passwordx'             => 'required'
        ]);

        $userdatax = array(
            'email' => $request->emailx,
            'password' => $request->passwordx
        );

        if (Auth::attempt($userdatax)) {

            $user       = Auth::user();
            $user_type  = $user['usertype'];

            if ($user_type == 1) {
                // Toastr::success('Have A Nice Day','Welcome');
                
                return view('admin.admin_dashbord');
            }
        } else {
            // Toastr::error('Invalid Email or Passsword','Error');
            return redirect()->back();
        }
    }
}
