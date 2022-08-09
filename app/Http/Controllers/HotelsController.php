<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\States;
use Illuminate\Http\Request;

class HotelsController extends Controller
{
    public function index()
    {
        $provinces = States::all();
        $hotels = Hotels::all();
        return view('hotels', compact('provinces', 'hotels'));
    }

    public function registerHotel(Request $request)
    {

        // $request->validate([
        //     'hotelname'    => 'required|min:3',
        //     'province_name'    => 'required',
        //     'description'    => 'required',
        //     'telephone'    => 'required',
        //     'address'    => 'required',

        // ]);

        // $state_image = time().'.'.$request->coverimage->extension();  
        // $request->coverimage->move(public_path('state_image'), $state_image);

        $cover_image = time() . '.' . $request->coverimage->extension();
        sleep(0.2);
        $photoone = time() . '.' . $request->photoone->extension();
        sleep(0.2);
        $phototwo = time() . '.' . $request->phototwo->extension();
        sleep(0.2);
        $photothree = time() . '.' . $request->photothree->extension();
        sleep(0.2);
        $photofour = time() . '.' . $request->photofour->extension();

        $request->coverimage->move(public_path('hotelimages'), $cover_image);
        $request->photoone->move(public_path('hotelimages'), $photoone);
        $request->phototwo->move(public_path('hotelimages'), $phototwo);
        $request->photothree->move(public_path('hotelimages'), $photothree);
        $request->photofour->move(public_path('hotelimages'), $photofour);

        $hotel = new Hotels();

        $hotel->state_id =  $request->province_name;
        $hotel->hotelname =  $request->hotelname;
        $hotel->description =  $request->description;
        $hotel->telephone_number =  $request->telephone;
        $hotel->address =  $request->address;

        $hotel->img_one_url     =  $photoone;
        $hotel->img_two_url     =  $phototwo;
        $hotel->img_three_url     =  $photothree;
        $hotel->img_four_url     =  $photofour;
        $hotel->img_cover_url     =  $cover_image;

        // $hotel->img_one_url	 =  "";
        // $hotel->img_two_url	 =  "";
        // $hotel->img_three_url	 =  "";
        // $hotel->img_four_url	 =  "";
        // $hotel->img_cover_url	 =  "";

        $hotel->save();
        return redirect()->back();
    }


    public function getHotelDetails(Request $request)
    {
        $id = $request->id;
        $hotel = Hotels::find($id);

        if ($hotel) {
            return response()->json([
                'status' => 200,
                'hotel' => $hotel,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "The Hotel is not found",
            ]);
        }
    }

    public function editHotel(Request $request)
    {
        $id = $request->hotelid;
        if (Hotels::where("id", $id)->exists()) {

            $hotel = Hotels::find($id);

            $hotel->hotelname =  $request->hotelname;
            $hotel->description =  $request->description;
            $hotel->telephone_number =  $request->telephone;
            $hotel->address =  $request->address;

            $hotel->save();

            return response()->json([
                'status' => 200,
                'message' => "update successfull",
            ]);
        }
    }

    public function provincehotel($id){
          
            $hotels = Hotels::where('state_id', $id)->get();
            return view('provincehotels',compact('hotels'));
    }

    public function viewHotel($id){
            $hotel = Hotels::where('id', $id)->first();
            return view('hotelview',compact('hotel'));
    }
}
