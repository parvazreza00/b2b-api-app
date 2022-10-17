<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit_request;
use Carbon\Carbon;

class Deposit_requestController extends Controller
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
                $bookingdata = Deposit_request::all();
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
        $datetime = Carbon::now();

        $request->validate([       
               'agentId'        =>'required',         
               'depositId'      =>'required',         
               'sender'         =>'required',         
               'reciever'       =>'required',         
               'paymentway'     =>'required',         
               'paymentmethod'  =>'required',         
               'transactionId'  =>'required',         
               'ref'            =>'required',         
               'amount'         =>'required',                        
               'attachment'     =>'required',                                    
               'status'         =>'required',                       
               'remarks'        =>'required',                       
        ]);  

        $header = $request->header("Authorization");
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['Message'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                $storeDepositRequestData = Deposit_request::insert([                    
                    'agentId'           => $request->agentId,
                    'depositId'         => $request->depositId,
                    'sender'            => $request->sender,
                    'reciever'          => $request->reciever,
                    'paymentway'        => $request->paymentway,
                    'paymentmethod'     => $request->paymentmethod,
                    'transactionId'     => $request->transactionId,
                    'ref'               => $request->ref,
                    'amount'            => $request->amount,
                    'attachment'        => $request->attachment,
                    'dateTime'          => $datetime,
                    'status'            => $request->status,
                    'remarks'           => $request->remarks,
                    'created_at'        => $created_at                
                ]); 
                return response()->json([
                    'success' => 'Success', 
                    'Ticketing' => $storeDepositRequestData,           
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
                $edit_Deposit_request = Deposit_request::findOrFail($id);
                return response()->json($edit_Deposit_request);
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
                Deposit_request::findOrFail($id)->update([
                    'agentId'          => $request->agentId,
                    'depositId'        => $request->depositId,
                    'sender'           => $request->sender,
                    'reciever'         => $request->reciever,
                    'paymentway'       => $request->paymentway,
                    'paymentmethod'    => $request->paymentmethod,
                    'transactionId'    => $request->transactionId,
                    'ref'              => $request->ref,
                    'amount'           => $request->amount,
                    'attachment'       => $request->attachment,
                    'status'           => $request->status,                    
                    'updated_at'       => $updated_at
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
                Deposit_request::findOrFail($id)->delete();
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
