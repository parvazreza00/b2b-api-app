<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $header = $request->header("Authorization");
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['Message'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                $bookingdata = Booking::all();
                return response()->json($bookingdata);
            }else{
                $message = "Authorization Token is miss-matched";
                return response()->json(['Message'=>$message], 422);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $created_at = Carbon::now();
        $request->validate([
            'BookingId'   => 'required',
            'agentId'     => 'required',
            'email'       => 'required|unique:bookings',
            'phone'       => 'required|unique:bookings',
            'pnr'         => 'required',
            'tripType'    => 'required',
            'pax'         => 'required',
            'adultCount'  => 'required',
            'childCount'  => 'required',
            'infantCount' => 'required',
            'netCost'     => 'required',
            'adultCostBase' => 'required',
            'childCostBase' => 'required',
            'infantCostBase'=> 'required',
            'adultCostTax'  => 'required',
            'childCostTax'  => 'required',
            'infantCostTax' => 'required',
            'grossCost'     => 'required',
            'baseFare'      => 'required',
            'Tax'           => 'required',
            'deptFrom'      => 'required',
            'airlines'      => 'required',
            'arriveTo'      => 'required',
            'gds'           => 'required',
            'status'        => 'required',
            'dateTime'      => 'required',
            'issueTime'     => 'required',
            'timeLimit'     => 'required'           
        ]);  
        $header = $request->header("Authorization");
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['Message'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                $stroeBookingData = Booking::insert([
                    'BookingId'=> $request->BookingId,
                    'agentId'=> $request->agentId,
                    'email'=> $request->email,
                    'phone'=> $request->phone,
                    'name'=> $request->name,
                    'pnr'=> $request->pnr,
                    'tripType'=> $request->tripType,
                    'pax'=> $request->pax,
                    'adultCount'=> $request->adultCount,
                    'childCount'=> $request->childCount,
                    'infantCount'=> $request->infantCount,
                    'netCost'=> $request->netCost,
                    'adultCostBase'=> $request->adultCostBase,
                    'childCostBase'=> $request->childCostBase,
                    'infantCostBase'=> $request->infantCostBase,
                    'adultCostTax'=> $request->adultCostTax,
                    'childCostTax'=> $request->childCostTax,
                    'infantCostTax'=> $request->infantCostTax,
                    'grossCost'=> $request->grossCost,
                    'baseFare'=> $request->baseFare,
                    'Tax'=> $request->Tax,
                    'deptFrom'=> $request->deptFrom,
                    'airlines'=> $request->airlines,
                    'arriveTo'=> $request->arriveTo,
                    'gds'=> $request->gds,
                    'status'=> $request->status,
                    'dateTime'=> $request->dateTime,
                    'issueTime'=> $request->issueTime,
                    'timeLimit'=> $request->timeLimit,
                    'created_at'=> $created_at
                    
                ]); 
                return response()->json([
                    'success' => 'Success', 
                    'Booking' => $stroeBookingData,           
                ]);
            }else{
                $message="Authorization Token is miss-matched";
                return response()->json(['Message'=>$message], 422);
            }            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $header=$request->header('Authorization');
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['message'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                $editbooking = Booking::findOrFail($id);
                return response()->json($editbooking);
            }else{
                $message = "Authorization Token is miss-matched";
                return response()->json(['message'=>$message], 422);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated_at = Carbon::now();

        $header=$request->header("Authorization");
        if($header==''){
            $message="Authorization is required";
            return response()->json(['msessage'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                Booking::findOrFail($id)->update([
                    'BookingId'=> $request->BookingId,
                    'agentId'=> $request->agentId,
                    'email'=> $request->email,
                    'phone'=> $request->phone,
                    'name'=> $request->name,
                    'pnr'=> $request->pnr,
                    'tripType'=> $request->tripType,
                    'pax'=> $request->pax,
                    'adultCount'=> $request->adultCount,
                    'childCount'=> $request->childCount,
                    'infantCount'=> $request->infantCount,
                    'netCost'=> $request->netCost,
                    'adultCostBase'=> $request->adultCostBase,
                    'childCostBase'=> $request->childCostBase,
                    'infantCostBase'=> $request->infantCostBase,
                    'adultCostTax'=> $request->adultCostTax,
                    'childCostTax'=> $request->childCostTax,
                    'infantCostTax'=> $request->infantCostTax,
                    'grossCost'=> $request->grossCost,
                    'baseFare'=> $request->baseFare,
                    'Tax'=> $request->Tax,
                    'deptFrom'=> $request->deptFrom,
                    'airlines'=> $request->airlines,
                    'arriveTo'=> $request->arriveTo,
                    'gds'=> $request->gds,
                    'status'=> $request->status,
                    'dateTime'=> $request->dateTime,
                    'issueTime'=> $request->issueTime,
                    'timeLimit'=> $request->timeLimit,
                    'updated_at' => $updated_at
                ]);
                return response()->json([
                    'success' => 'Update Successfully',                       
                ]);
            }else{
                $message="Authorization Token is miss-matched";
                return response()->json(['msessage'=>$message], 422);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $header = $request->header('Authorization');
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['message' => $message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                Booking::findOrFail($id)->delete();
                return response()->json([
                'Delete' => "Deleted successfully",
                ]);
            }else{
                $message = "Authorization Token is miss-mathced";
                return response()->json(['message' => $message], 422);
            }
        }
    }
}
