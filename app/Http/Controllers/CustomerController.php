<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\States;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function customerCreate(Request $request)
    {


        $request->validate([
            'name'           => 'required|min:3',
            'email'            => 'required|email',
            'phone'                => 'required|min:9|max:12',
            'password'                  => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);


        $customer = new Customer();
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = 0;
        $user->password = bcrypt($request['password']);

        $customer->fullname    = $request->name;
        $customer->email    = $request->email;
        $customer->phone_number    = $request->phone;
        $customer->address    = $request->address;
        $customer->password    = bcrypt($request['password']);

        $user->save();

        $success = $customer->save();
        
        if($success){
            return view('login');
        }else{
            return redirect()->back();
        }
        
    }

    public function login(Request $request)
    {
        //system Login Here
        //validation in here
        $request->validate([
            'email'                => 'required',
            'password'             => 'required'
        ]);
        $userdata = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::attempt($userdata)) {

            $user       =Auth::user();
            $user_type  =$user['usertype'];

            $provinces = States::all();
            if ($user_type == 0) {
                // Toastr::success('Have A Nice Day','Welcome');
               return view('home',compact('provinces'));
            }
        } else {
            // Toastr::error('Invalid Email or Passsword','Error');
            return redirect()->back();
        }
    }
}
