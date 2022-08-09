<?php

namespace App\Http\Controllers;

use App\Models\States;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StatesController extends Controller
{

    public function index()
    {
        $provinces = States::all();
        return view('admin.province', compact('provinces'));
    }

    public function regProvince(Request $request)
    {
        $request->validate([
            'province_name'    => 'required|min:3',
            'description'    => 'required',

        ]);

        $state_image = time() . '.' . $request->coverimage->extension();
        $request->coverimage->move(public_path('state_image'), $state_image);

        $state = new States();
        $state->state_name =  $request->province_name;
        $state->state_image =  $state_image;
        $state->description =  $request->description;

        $state->save();

        return redirect()->back();
    }

    public function provinceDetails(Request $request)
    {
        $id = $request->id;
        $state = States::find($id);

        if ($state) {
            return response()->json([
                'status' => 200,
                'state' => $state,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => "The province is not found",
            ]);
        }
    }

    public function editprovince(Request $request)
    {
        $id = $request->provinceid;
        if (States::where("id", $id)->exists()) {

            $province = States::find($id);

            $province->state_name =  $request->provincename;
            $province->description =  $request->description;

            $province->save();

            return response()->json([
                'status' => 200,
                'message' => "Update successfull",
            ]);
        }
    }

    public function deleteProvince(Request $request){
         $id = $request-> provinceid;
         $province=States::find($id);
         $province->delete(); //returns true/false
    }
}
