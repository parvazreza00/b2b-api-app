<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\client;
use Carbon\Carbon;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = client::all();
        return response()->json($clients);
        
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
        $joinAt = Carbon::now();

        if(!$request->hasFile('companyImage')){
            return response()->json(['upload_file_not_found'], 400);
        }
        $allowefileExtension = ['pdf','jpg','png'];
        $files = $request->file('companyImage');
        $errors = [];
        foreach($files as $file){
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowefileExtension);
            if($check){
                foreach($request->companyImage as $mediaFiles){
                    $companyImage = $mediaFiles->store('public/images/');
                    $name = $mediaFiles->getClientOriginalName();
                //store image file into directory and db
                $savecompanyImage = new Image();                
                $savecompanyImage->companyImage = $companyImage;
                $savecompanyImage->save();
                }
            }else{
                return response()->json(['invalid_flie_format'], 422);
            }
            return response()->json(['file_uploaded'], 200);
        }

        $request->validate([
            'agentId'        => 'required',
            'name'           => 'required',
            'email'          => 'required|email',
            'password'       => 'required',
            'phone'          => 'required',
            'photo'          => 'required',
            // 'joinAt'         => 'required',
            'status'         => 'required',
            'company'        => 'required',
            'companyadd'     => 'required',
            'companyImage'   => 'required',
            'logo'           => 'required',
            'logoPermission' => 'required',
            'markup'         => 'required',
        ]);
        $clients = client::insert([
            'agentId' => $request->agentId,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'photo' => $request->photo,
            'joinAt' => $joinAt,
            'status' => $request->status,
            'company' => $request->company,
            'companyadd' => $request->companyadd,
            'companyImage' => $request->companyImage,
            'logo' => $request->logo,
            'logoPermission' => $request->logoPermission,
            'markup' => $request->markup,            
        ]);
        return response()->json([
            'success' => 'Success', 
            'Employee' => $clients,           
        ]);
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
