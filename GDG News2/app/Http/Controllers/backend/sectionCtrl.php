<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Section;
use App\News;
use Redirect;
use Session;
use Auth;

class sectionCtrl extends Controller
{
    
    //view sections page
    public function section() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(isset($_GET['search'])) {
                $data = Section::where('name','like','%'.$_GET['search'].'%')->get();
                return view('backend.sections.list')->withdata($data);
            }
            else {
                if(Section::count() > 0 ) {
                    $data = Section::OrderBy('name','ASC')->get();
                    return view('backend.sections.list')->withdata($data);
                }
                return view('backend.sections.list');
            }
        }
        return Redirect::back();
    }
    
    //view new sections page
    public function create() {
        if(Auth::check() && Auth::User()->rank>0) {
            return view('backend.sections.create');
        }
        return Redirect::back();
    }
    
    //add new section
    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:50',
            'active' => 'required',
            'sort' => 'required|numeric|min:0'
        ]);
        
        if(Section::where('name', $request->input('name'))->count() > 0) {
            Session::flash('error','This Section Already Exist');
        }
        else {
            $data = new Section;
            $data->name = $request->input('name');
            $data->active = $request->input('active');
            $data->sort = $request->input('sort');
            $data->save();
            
            Session::flash('success','Section Added Successfuly');
        }
        
        return Redirect::to('dashboard/sections/new') ;
    }
    
    //view edit sections page
    public function edit($sectionid) {
       
        if(Auth::check() && Auth::User()->rank>0) {
            if(Section::where('id',$sectionid)->count() > 0 ) {
                $data = Section::where('id',$sectionid)->first();
                return view('backend.sections.edit')->withdata($data);
            }
            return Redirect::back();
        }
        return Redirect::back();
    }
    
    //edit sections 
    public function update(Request $request, $sectionid) {
        
        try {
            $validatedData = $request->validate([
                'name' => 'required|min:2|max:50',
                'active' => 'required',
                'sort' => 'required|numeric|min:0'
            ]);

            if(Section::where('id',$sectionid)->count() > 0 ) {
                
                $data = Section::where('id',$sectionid)->first();
                
                $data->name = $request->input('name');
                $data->active = $request->input('active');
                $data->sort = $request->input('sort');
                $data->save();

                Session::flash('success','Section Edited Successfuly');
                return Redirect::back();
            }
            else {
                Session::flash('error','Section Not exist');
            }
            
        } catch (EXCEPTION $e) {
            Session::flash('error','Error:'.$e);
        }

    }
    
    //delete section
    public function delete($id) {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Section::where('id',$id)->count() > 0) {

                if(News::where('section',$id)->count() > 0) {
                    Session::flash('error','please delete news first');
                }
                else {
                    $data = Section::where('id',$id)->first();
                    $data->delete();    
                }

            }

            return Redirect::to('dashboard/sections');
        }
        return Redirect::back();
    }
    
    //
    
}
