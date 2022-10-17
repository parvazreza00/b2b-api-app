<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use Carbon\Carbon;


class ActivityLogController extends Controller
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
                $activityLogdata = ActivityLog::all();
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
               'reference'  =>'required',         
               'name'    =>'required',         
               'empId'  =>'required',         
               'activity'    =>'required'                             
        ]);  

        $header = $request->header("Authorization");
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['Message'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                $storeActivityLogData = ActivityLog::insert([
                        "reference"      => $request->reference,       
                        "name"           => $request->name,       
                        "empId"          => $request->empId,       
                        "activity"       => $request->activity,       
                        "created_at"     => Carbon::now(),                                      
            ]); 
                return response()->json([
                    'success' => 'Success', 
                    'Ticketing' => $storeActivityLogData,           
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
                $editbooking = ActivityLog::findOrFail($id);
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
        $header=$request->header("Authorization");
        if($header==''){
            $message="Authorization is required";
            return response()->json(['msessage'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                ActivityLog::findOrFail($id)->update([
                    'reference'     => $request->reference,
                    'name'       => $request->name,
                    'empId'     => $request->empId,
                    'activity'       => $request->activity,                    
                    'updated_at'    => Carbon::now()
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
                ActivityLog::findOrFail($id)->delete();
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
