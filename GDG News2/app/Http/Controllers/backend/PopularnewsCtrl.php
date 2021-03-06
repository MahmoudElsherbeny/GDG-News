<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Popularnews;
use Redirect;
use Session;
use File;
use Auth;

class PopularnewsCtrl extends Controller
{
    
    // ------------------  view news page  ---------------------------
    public function news() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(isset($_GET['search'])) {
                $data = Popularnews::where('title','like','%'.$_GET['search'].'%')->paginate(15);
                return view('backend.newspopular.list')->withdata($data);
            }
            else {
                $data = Popularnews::OrderBy('id','ASC')->paginate(15);
                return view('backend.newspopular.list')->withdata($data);
            }
        }
        return Redirect::back();
    }
    
    //view create news page
    public function create() {
        if(Auth::check() && Auth::User()->rank>0) {
            return view('backend.newspopular.create');
        }
        return Redirect::back();
    }
    
    //create new news
    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'section' => 'required',
            'title' => 'required|min:5',
            'descripe' =>'required|min:50',
            'out_description' =>'required|min:30',
            'active' => 'required',
            'journalist' => 'required|min:5',
            'img' => 'required'
        ]);
        
        try {
            $data = new Popularnews;
            $data->section = $request->input('section');
            $data->title = $request->input('title');
            $data->description = $request->input('descripe');
            $data->out_description = $request->input('out_description');
            $data->active = $request->input('active');
            $data->journalist = $request->input('journalist');

            $file = $request->file('img');
            $path = 'uploads/news/';
            $filename = date('y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
            $file->move(public_path().'/'.$path,$filename);
            $data->image = $path.$filename;
            $data->save();
            
            Session::flash('success','news added successfully');
        } catch (EXTENSION $e) {
            Session::flash('error','Error:'.$e);
        }
        
        return Redirect::back();
    }
    
    
    //view edit news page
    public function edit($newsid) {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Popularnews::where('id',$newsid)->count() > 0 ) {
                $data = Popularnews::where('id',$newsid)->first();
                return view('backend.newspopular.edit')->withdata($data);
            }
            return Redirect::back();
        }
        return Redirect::back();
    }
    
    //edit news
    public function update(Request $request, $id) {
        
        $validatedData = $request->validate([
            'section' => 'required',
            'title' => 'required|min:5',
            'descripe' =>'required|min:50',
            'out_description' =>'required|min:30',
            'active' => 'required',
            'journalist' => 'required|min:5',
        ]);
        
        try {
            
            if(Popularnews::where('id',$id)->count() > 0 ) {
                
                $data = Popularnews::where('id',$id)->first();
                
                $data->section = $request->input('section');
                $data->title = $request->input('title');
                $data->description = $request->input('descripe');
                $data->out_description = $request->input('out_description');
                $data->active = $request->input('active');
                $data->journalist = $request->input('journalist');

                if($request->file('img')) {
                    File::Delete($data->image);
                    
                    $file = $request->file('img');
                    $path = 'uploads/news/';
                    $filename = date('y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/'.$path,$filename);
                    $data->image = $path.$filename;
                }
                $data->save();

                Session::flash('success','news edited successfully');
                return Redirect::back();
            }
            else {
                Session::flash('error','news not exist');
            }
        } catch (EXTENSION $e) {
            Session::flash('error','Error:'.$e);
        }
        
    }
    
    //delete news
    public function delete($id) {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Popularnews::where('id',$id)->count() > 0) {
                $data = Popularnews::where('id',$id)->first();
                File::Delete($data->image);
                $data->delete();
            }

            return Redirect::to('dashboard/news');
        }
        return Redirect::back();
    }
    
    //
    
}
