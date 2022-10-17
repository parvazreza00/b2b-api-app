<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Search_history;
use Carbon\Carbon;

class Search_historyController extends Controller
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
                $bookingdata = Search_history::all();
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
        $searchTime = Carbon::now();
        $depTime    = Carbon::now();
        
        $request->validate([
               'searchId'  =>'required',         
               'agentId'    =>'required',         
               'searchtype'  =>'required',         
               'DepFrom'    =>'required',         
               'ArrTo'      =>'required',         
               'class'       =>'required',        
                                       
        ]);  

        $header = $request->header("Authorization");
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['Message'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                $storeSearchHistoryData = Search_history::insert([
                    'searchId'      => $request->searchId,
                    'agentId'       => $request->agentId,
                    'searchtype'   => $request->searchtype,
                    'DepFrom'       => $request->DepFrom,
                    'ArrTo'         => $request->ArrTo,
                    'class'         => $request->class,
                    'searchTime'    => $searchTime,
                    'depTime'       => $depTime,
                    'adult'         => $request->adult,
                    'child'         => $request->child,
                    'infant'        => $request->infant,
                    'returnTime'    => Carbon::now(),                    
                    'created_at'    => $created_at                
                ]); 
                return response()->json([
                    'success' => 'Success', 
                    'Ticketing' => $storeSearchHistoryData,           
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
                $editSearch_history = Search_history::findOrFail($id);
                return response()->json($editSearch_history);
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
                Search_history::findOrFail($id)->update([
                    'searchId'      => $request->searchId,
                    'agentId'       => $request->agentId,
                    'searchtype'   => $request->searchtype,
                    'DepFrom'       => $request->DepFrom,
                    'ArrTo'         => $request->ArrTo,
                    'class'         => $request->class,
                    'searchTime'    => Carbon::now(),
                    'depTime'       => Carbon::now(),
                    'adult'         => $request->adult,
                    'child'         => $request->child,
                    'infant'        => $request->infant,
                    'returnTime'    => Carbon::now(),   
                    'updated_at'    => $updated_at
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
                Search_history::findOrFail($id)->delete();
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
