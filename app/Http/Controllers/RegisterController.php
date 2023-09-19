<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User_table;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    //
    function DataInsert(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => ['required', 'email', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'password' => 'required|min:8|confirmed',
            'email_confirmation' => 'required|email|same:email',
            'password_confirmation' => 'required|same:password',
        ]);
        
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors()->all());
        }
    
        $username = $request->input('username');
        $password = Hash::make($request->input('password'));
        $email = $request->input('email');
    
        $isInsertSuccess = User_table::insert(['username'=>$username, 'password'=>$password, 'email'=>$email]);
        $user = User_table::where('username', $request->username)->first();

        if($isInsertSuccess) {
            session(['user_id' => $user->id]);
            return redirect()->route('login');
        } else {
            return response()->json(['error' => 'Insert unsuccess'], 500);           
        }
    }    
}