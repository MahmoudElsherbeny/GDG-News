<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Slide;
use Redirect;
use Session;
use File;
use Auth;

class slideCtrl extends Controller
{
    
    //view slides page
    public function slide() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Slide::count() > 0 ) {
                $data = Slide::OrderBy('id','ASC')->paginate(15);
                return view('backend.slideshow.list')->withdata($data);
            }
            return view('backend.slideshow.list');
        }
        return Redirect::back();
    }
    
    //view new slide page 
    public function create() {
        if(Auth::check() && Auth::User()->rank>0) {
            return view('backend.slideshow.create');
        }
        return Redirect::back();
    }
    
    //add new slideCtrl
    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'title' => 'required|min:5',
            'descripe' =>'required|min:50',
            'sort' => 'required|numeric|min:0',
            'active' => 'required',
            'img' => 'required'
        ]);
        
        try {
            $data = new Slide;
            $data->title = $request->input('title');
            $data->description = $request->input('descripe');
            $data->sort = $request->input('sort');
            $data->active = $request->input('active');

            $file = $request->file('img');
            $path = 'uploads/slides/';
            $filename = date('y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/'.$path,$filename);
            $data->image = $path.$filename;
            $data->save();
            
            Session::flash('success','slide added successfully');
        } catch (EXTENSION $e) {
            Session::flash('error','Error:'.$e);
        }
        
        return Redirect::back();
        
    }
    
    //view edit slide page
    public function edit(Request $request, $id) {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Slide::where('id',$id)->count() > 0 ) {
                $data = Slide::where('id',$id)->first();
                return view('backend.slideshow.edit')->withdata($data);
            }
            return Redirect::back();
        }
        return Redirect::back();
    }
    
    //edit slide
    public function update(Request $request, $id) {
        
        $validatedData = $request->validate([
            'title' => 'required|min:5',
            'descripe' =>'required|min:50',
            'sort' => 'required|numeric|min:0',
            'active' => 'required',
        ]);
        
        try {
            
            if(Slide::where('id',$id)->count() > 0 ) {
                
                $data = Slide::where('id',$id)->first();
                
                $data->title = $request->input('title');
                $data->description = $request->input('descripe');
                $data->sort = $request->input('sort');
                $data->active = $request->input('active');

                if($request->file('img')) {
                    File::Delete($data->image);
                    $file = $request->file('img');
                    $path = 'uploads/slides/';
                    $filename = date('y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/'.$path,$filename);
                    $data->image = $path.$filename;
                }
                
                $data->save();

                Session::flash('success','slide edited successfully');
                return Redirect::back();
            }
            else {
                Session::flash('error','slide not exist');
            }
        } catch (EXTENSION $e) {
            Session::flash('error','Error:'.$e);
        }
        
    }
    
    //delete slide
    public function delete($id) {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Slide::where('id',$id)->count() > 0) {
                $data = Slide::where('id',$id)->first();
                File::Delete($data->image);
                $data->delete();
            }

            return Redirect::to('dashboard/slides');
        }
        return Redirect::back();
    }
    
    //

}
