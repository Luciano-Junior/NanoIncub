<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;

class AuthController extends Controller
{
   // public function login(Request $request){
   //    $credentials = $request->only('login', 'senha');
   //    dd(Auth::attempt($credentials));
 
   //    if (Auth::attempt($credentials)) {
   //        // Authentication passed...
   //        return redirect()->intended('dashboard');
   //    }
   // }

   public function username(){
      return 'login';
   }
}
