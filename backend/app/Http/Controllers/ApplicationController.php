<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function resume_upload(Request $request){
  $validator = Validator::make($request->all(), [
            'Name' => 'required|string',
            'Mobile' => 'required',
            'Email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'Text' => 'required',
            'Resume' => 'required|mimes:pdf|max:1024',
            ]);
         if($validator->fails()){
            return response(['Message' => 'Something Went Wrong Input']);
            }
            $Resume=$request->file('Resume');            
            $name=uniqid().$Resume->getClientOriginalName();
            $uploadPath='public/Resume/';
            $Resume->move($uploadPath,$name);
            $ResumeUrl=$uploadPath.$name;

        Application::create(array_merge($request->all(),['Resume'=>$ResumeUrl,'IP'=>$request->ip()]));
            return response(['Message'=>'Successfully Application Submit']);
    }
    public function application(){
        $data=Application::orderBy('id','DESC')->get();
        return response()->json($data);
    }
}
