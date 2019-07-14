<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\setting;
use Redirect;
use Session;
use Auth;

class settingCtrl extends Controller
{
    
    // ------------------  view setting page  ------------------
    public function setting() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(isset($_GET['search'])) {
                $data = Setting::where('property','like','%'.$_GET['search'].'%')->get();
                return view('backend.setting.list')->withdata($data);
            }
            else {
                if(Setting::count() > 0 ) {
                    $data = Setting::all();
                    return view('backend.setting.list')->withdata($data);
                }
                return view('backend.setting.list');
            }
        }
        return Redirect::back();
    }
    
    // ------------------  view edit setting page  ------------------
    public function edit($id) {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Setting::where('id',$id)->count() > 0 ) {
                $data = Setting::where('id',$id)->first();
                return view('backend.setting.edit')->withdata($data);
            }
            return Redirect::back();
        }
        return Redirect::back();
    }
    
    // ------------------  edit setting  ------------------
    public function update(Request $request, $id) {
        
        try {
            $validatedData = $request->validate([
                'value' => 'required',
            ]);

            if(Setting::where('id',$id)->count() > 0 ) {
                
                $data = Setting::where('id',$id)->first();
                
                $data->value = $request->input('value');
                $data->save();

                Session::flash('success','Setting Edited Successfuly');
                return Redirect::back();
            }
            else {
                Session::flash('error','Setting Not exist');
            }
            
        } catch (EXCEPTION $e) {
            Session::flash('error','Error:'.$e);
        }

    }
    
    //
}
