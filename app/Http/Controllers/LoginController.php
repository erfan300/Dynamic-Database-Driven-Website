<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User_table;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = User_table::where('username', $request->username)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->uid]);
            return redirect()->route('redirect');
        }
    
        return redirect()->back()->withErrors(['error' => 'Invalid credentials'])->withInput();
    }
    
}
