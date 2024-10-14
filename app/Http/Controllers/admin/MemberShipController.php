<?php

namespace App\Http\Controllers\admin;

use App\Models\Plan;
use Illuminate\Http\Request;

class MemberShipController
{

    function allpan()
    {
        $plans=Plan::all();

        return view('admin.allmember', compact('plans'));
    }

    function createplan(Request $request)
    {
        $request->validate([
            'plan_name' => 'required',
            'plan_price' => 'required',
            'plan_duration' => 'required',
            'plan_code' => 'required',
            'plan_description' => 'required',
        ]);

        Plan::create([
            'plan'=>$request->plan_name,
            'amount'=>$request->plan_price,
            'body'=>$request->plan_description,
            'code'=>$request->plan_code,
            'days'=>$request->plan_duration,
            'status'=>1,
        ]);
        $msg="membership created successfully";
        return response()->json([
            'status'=>1,
            'message'=>$msg,
        ]);

    }
    function deleteplan($id)
    {
        $plan=Plan::where('id',$id)->first();
        $plan->delete();
        $msg="membership deleted successfully";
        return response()->json([
            'status'=>1,
            'message'=>$msg,
        ]);

    }
}
