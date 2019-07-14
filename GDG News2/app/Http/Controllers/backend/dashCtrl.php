<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Redirect;
use Auth;

class dashCtrl extends Controller
{
    
    //view dashboard page
    public function index() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Auth::User()->rank > 0) {
                return view('backend.layout.index');
            }
            return Redirect::back();
        }
        
        return Redirect::back();
    }
    
    //
    
}
