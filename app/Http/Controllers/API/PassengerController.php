<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;
use Carbon\Carbon;

class PassengerController extends Controller
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
                $activityLogdata = Passenger::all();
                return response()->json($activityLogdata);
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
        
        $request->validate([
            'agentId'       =>'required',       
            'BookingId'     =>'required',         
            'fname'         =>'required',  
            'lname'         =>'required',         
            'dob'           =>'required',         
            'type'          =>'required',         
            'nationality'   =>'required',         
            'passportno'    =>'required',         
            'passexpireDate'=>'required',         
            'phone'         =>'required|unique:passengers',                                          
            'email'         =>'required|unique:passengers|      max:100',                                          
            'address'       =>'required',                                          
            'gender'        =>'required',                                         
                                
     ]);  

     $header = $request->header("Authorization");
     if($header==''){
         $message = "Authorization is required";
         return response()->json(['Message'=>$message], 422);
     }else{
         if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
             $storePassendgerData = Passenger::insert([
                    "agentId"           => $request->agentId,       
                    "BookingId"         => $request->BookingId,       
                    "fname"             => $request->fname,       
                    "lname"             => $request->lname,       
                    "dob"               => $request->dob,       
                    "type"              => $request->type,       
                    "nationality"       => $request->nationality,       
                    "passportno"        => $request->passportno,       
                    "passexpireDate"    => $request->passexpireDate,       
                    "phone"             => $request->phone,       
                    "email"             => $request->email,       
                    "address"           => $request->address,       
                    "gender"            => $request->gender,      
                    "created_at"        => Carbon::now(),                                      
         ]); 
             return response()->json([
                 'success' => 'Success', 
                 'Ticketing' => $storePassendgerData,           
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
                $editPassenger = Passenger::findOrFail($id);
                return response()->json($editPassenger);
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
        $header=$request->header("Authorization");
        if($header==''){
            $message="Authorization is required";
            return response()->json(['msessage'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                Passenger::findOrFail($id)->update([
                    "agentId"           => $request->agentId,       
                    "BookingId"         => $request->BookingId,       
                    "fname"             => $request->fname,       
                    "lname"             => $request->lname,       
                    "dob"               => $request->dob,       
                    "type"              => $request->type,       
                    "nationality"       => $request->nationality,       
                    "passportno"        => $request->passportno,       
                    "passexpireDate"    => $request->passexpireDate,       
                    "phone"             => $request->phone,       
                    "email"             => $request->email,       
                    "address"           => $request->address,       
                    "gender"            => $request->gender,
                    "updated_at"        => Carbon::now(),  
                ]);

                return response()->json([
                    'success' => 'Updated Successfully',                       
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
                Passenger::findOrFail($id)->delete();
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
