<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Customer;
use App\Models\Hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    
    public function index(){
        $status = 0;
        $orders = Bookings::where('status', $status)->get();
        return view('admin.bookinglist',compact('orders'));
    }
    
    public function addbooking(Request $request)
    {
        $request->validate([
            'userid'    => 'required',
            'hotelid'    => 'required',
            'checkindate'    => 'required',
            'checkoutdate'    => 'required',
            'adultc'    => 'required',
            'childc'    => 'required',
        ]);

        $order = new Bookings();
        $order->customer_id = $request->userid;
        $order->hotel_id = $request->hotelid;
        $order->adult_c = $request->adultc;
        $order->child_c	 = $request->childc;
        $order->checkindate	 = $request->checkindate;
        $order->checkoutdate = $request->checkoutdate;
        $order->status = 0;

        $order->save();
        return view('ordersuccess');
    }

    public function viewOrderDetails(Request $request){
         $id = $request-> id;
         $order = Bookings::find($id);

         $hotelid = $order->hotel_id;
         $customer_id = $order->customer_id;
         $hotel = Hotels::where('id', $hotelid)->first();
         $customer = Customer::where('id', $customer_id)->first();

        if ($order) {
            return response()->json([
                'status' => 200,
                'order' => $order,
                'hotel' => $hotel,
                'customer' => $customer
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "The Hotel is not found",
            ]);
        }

    }

    public function confirmorder(Request $request){
         $id = $request->orderid;

         if (Bookings::where("id", $id)->exists()) {

            $order = Bookings::find($id);

            $order->status =  1;
            $order->save();

            return response()->json([
                'status' => 200,
                'message' => "update successfull",
            ]);
        }
    }

    public function confirmationview(){
         $customerid = Auth::user()->id;
         $orders =  Bookings::where('customer_id', $customerid)
         ->get();
         return view('myorder',compact('orders'));
    }
}
