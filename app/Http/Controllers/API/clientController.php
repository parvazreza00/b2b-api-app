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
    public function index(Request $request)
    {
        $header = $request->header('Authorization');
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['message'=>$message], 422);            
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                $clients = client::all();
                return response()->json($clients);
            }else{
                $message = "Authorization Token is miss-matched ";
                return response()->json(['message'=>$message], 422);
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
        $joinAt = Carbon::now();

        $request->validate([
            'agentId'        => 'required',
            'name'           => 'required',
            'email'          => 'required|unique:clients',
            'password'       => 'required',
            'phone'          => 'required',
            'photo'          => 'required|mimes:jpg,jpeg,png',
            // 'joinAt'         => 'required',
            'status'         => 'required',
            'company'        => 'required',
            'companyadd'     => 'required',
            'companyImage'   => 'required|mimes:jpg,jpeg,png',
            'logo'           => 'required',
            'logoPermission' => 'required',
            'markup'         => 'required',
        ],[
            'agentId.required' => 'Please input agent Id',
            'name.required'    => 'Please input name',
            'email.required' => 'Please input valid email',
            'password.required' => 'Please input password',
            'phone.required' => 'Please input phone',
            'photo.required' => 'Please input photo',
            'status.required' => 'Please input status',
            'company.required' => 'Please input company name',
            'companyadd.required' => 'Please input company address',
            'companyImage.required' => 'Please input company Image',
            'logo.required' => 'Please input company logo',
        ]);
        //photo generate..............................
        $photo = $request->file('photo');
        $photo_name_gen = hexdec(uniqid());
        $photo_ext = strtolower($photo->getClientOriginalExtension());
        $photo_name = $photo_name_gen.'.'.$photo_ext;
        $up_location_photo = 'images/clientImages/';
        $photo->move($up_location_photo,$photo_name);
        $last_photo = $up_location_photo.$photo_name;
        //companyImage generate.......................
        $companyImage = $request->file('companyImage');
        $companyImage_name_gen = hexdec(uniqid());
        $companyImage_ext = strtolower($companyImage->getClientOriginalExtension());
        $companyImage_name = $companyImage_name_gen.'.'.$companyImage_ext;
        $up_location_companyImage = 'images/companyImages/';
        $companyImage->move($up_location_companyImage,$companyImage_name);
        $last_upload_companyImage = $up_location_companyImage.$companyImage_name;
        //logo generate..............................
        $logo = $request->file('logo');
        $logo_name_gen = hexdec(uniqid());
        $logo_ext = strtolower($logo->getClientOriginalExtension());
        $logo_name = $logo_name_gen.'.'.$logo_ext;
        $up_logo_location = 'images/logo/';
        $logo->move($up_logo_location,$logo_name);
        $last_logo_upload = $up_logo_location.$logo_name;

        $header = $request->header("Authorization");
        if($header==''){
            $message = "Authorization is required";
            return response()->json(['message'=>$message], 422);
        }else{
            if($header=='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6ImZseWZhcmludCIsImlhdCI6MTUxNjIzOTAyMn0.kuYVlB9XaphllxKxlmlI-LidbDaUodL58kL8jxG0ANM'){
                $clients = client::insert([
                    'agentId' => $request->agentId,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'phone' => $request->phone,
                    'photo' => $last_photo,
                    'joinAt' => $joinAt,
                    'status' => $request->status,
                    'company' => $request->company,
                    'companyadd' => $request->companyadd,
                    'companyImage' => $last_upload_companyImage,
                    'logo' => $last_logo_upload,
                    'logoPermission' => $request->logoPermission,
                    'markup' => $request->markup,            
                ]);
                return response()->json([
                    'success' => 'Success', 
                    'Client' => $clients,           
                ]);
            }else{
                $message = "Authorization Token is miss-matched";
            return response()->json(['message'=>$message], 422);
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
                $editClient = client::findOrFail($id);
                return response()->json($editClient);
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
                client::findOrFail($id)->update([
                    'agentId' => $request->agentId,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'phone' => $request->phone,
                    // 'photo' => $last_photo,
                    // 'joinAt' => $joinAt,
                    'status' => $request->status,
                    'company' => $request->company,
                    'companyadd' => $request->companyadd,
                    // 'companyImage' => $last_upload_companyImage,
                    // 'logo' => $last_logo_upload,
                    // 'logoPermission' => $request->logoPermission,
                    'markup' => $request->markup, 
                    'updated_at' => $updated_at
                ]);
                return response()->json([
                    'success' => 'Update Success',                       
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
                client::findOrFail($id)->delete();
                return response()->json([
                'Delete' => "Deleted successfully",
                ]);
            }else{
                $message = "Authorization does not mathced";
                return response()->json(['message' => $message], 422);
            }
        }
        
    }
}
