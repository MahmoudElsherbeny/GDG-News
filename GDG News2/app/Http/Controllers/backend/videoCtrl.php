<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Video;
use Redirect;
use Session;
use File;
use Auth;

class videoCtrl extends Controller
{
    
    // ------------------  view videos page  ---------------------------
    public function videos() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(isset($_GET['search'])) {
                $data = Video::where('title','like','%'.$_GET['search'].'%')->paginate(15);
                return view('backend.videos.list')->withdata($data);
            }
            else {
                if(Video::count() > 0 ) {
                    $data = Video::OrderBy('id','ASC')->paginate(15);
                    return view('backend.videos.list')->withdata($data);
                }
                return view('backend.videos.list');
            }
        }
        return Redirect::back();
    }
    
    // ----------------  view create videos page  -------------
    public function create() {
        if(Auth::check() && Auth::User()->rank>0) {
            return view('backend.videos.create');
        }
        return Redirect::back();
    }
    
    // -------------------  create new videos  ---------------
    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'section' => 'required',
            'title' => 'required|min:5',
            'descripe' =>'required|min:10',
            'out_description' =>'required|min:30',
            'active' => 'required',
            'journalist' => 'required|min:5',
            'link' => 'required|url',
            'img' => 'required'
        ]);
        
        try {
            $data = new Video;
            $data->section = $request->input('section');
            $data->title = $request->input('title');
            $data->description = $request->input('descripe');
            $data->out_description = $request->input('out_description');
            $data->active = $request->input('active');
            $data->journalist = $request->input('journalist');
            $data->link = $request->input('link');
            
            $file = $request->file('img');
            $path = 'uploads/news/';
            $filename = date('y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/'.$path,$filename);
            $data->image = $path.$filename;
            $data->save();
            
            Session::flash('success','video added successfully');
        } catch (EXTENSION $e) {
            Session::flash('error','Error:'.$e);
        }
        
        return Redirect::back();
    }
    
    
    //  -----------------  view edit videos page   --------------
    public function edit($videosid) {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Video::where('id',$videosid)->count() > 0 ) {
                $data = Video::where('id',$videosid)->first();
                return view('backend.videos.edit')->withdata($data);
            }
            return Redirect::back();
        }
        return Redirect::back();
    }
    
    // ---------------------  edit videos  ----------------------
    public function update(Request $request, $id) {
        
        $validatedData = $request->validate([
            'section' => 'required',
            'title' => 'required|min:5',
            'descripe' =>'required|min:10',
            'out_description' =>'required|min:30',
            'active' => 'required',
            'journalist' => 'required|min:5',
        ]);
        
        try {
            
            if(Video::where('id',$id)->count() > 0 ) {
                
                $data = Video::where('id',$id)->first();
                
                $data->section = $request->input('section');
                $data->title = $request->input('title');
                $data->description = $request->input('descripe');
                $data->out_description = $request->input('out_description');
                $data->active = $request->input('active');
                $data->journalist = $request->input('journalist');
                $data->link = $request->input('link');
                
                if($request->file('img')) {
                    File::Delete($data->image);
                    
                    $file = $request->file('img');
                    $path = 'uploads/news/';
                    $filename = date('y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/'.$path,$filename);
                    $data->image = $path.$filename;
                }
                $data->save();

                Session::flash('success','video edited successfully');
                return Redirect::back();
            }
            else {
                Session::flash('error','video not exist');
            }
        } catch (EXTENSION $e) {
            Session::flash('error','Error:'.$e);
        }
        
    }
    
    // --------------------  delete videos  ----------------------
    public function delete($id) {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Video::where('id',$id)->count() > 0) {
                $data = Video::where('id',$id)->first();
                $data->delete();
            }

            return Redirect::to('dashboard/videos');
        }
        return Redirect::back();
    }
    
    //
    
}
