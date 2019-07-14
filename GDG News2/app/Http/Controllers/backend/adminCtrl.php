<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Encryption\DecryptException;


use App\User;
use Redirect;
use Session;
use Auth;
use Hash;
use Crypt;

class adminCtrl extends Controller
{
    
    // --------------------  view all users page  --------------------------
    public function users() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(isset($_GET['search'])) {
                $data = User::where('name','like','%'.$_GET['search'].'%')
                            ->where('rank', 0)->paginate(20);
                return view('backend.users.list')->withdata($data);
            }
            else {
                if(User::where('rank', 0)->count() > 0 ) {
                    $data = User::where('rank', 0)->OrderBy('created_at','DESC')->paginate(20);
                    return view('backend.users.list')->withdata($data);
                }
            return view('backend.users.list');
            }
        }
        
        return Redirect::back();
    }
    
    //  -----------------------  view admins page  -------------------------
    public function admins() {
        
         if(Auth::check() && Auth::User()->rank>0) {
            if(isset($_GET['search'])) {
                $data = User::where('name','like','%'.$_GET['search'].'%')
                            ->where('rank', '>', 0)->paginate(20);
                return view('backend.users.admins')->withdata($data);
            }
            else {
                if(User::where('rank', '>', 0)->count() > 0 ) {
                    $data = User::where('rank', '>', 0)->OrderBy('created_at','DESC')->paginate(20);
                    return view('backend.users.admins')->withdata($data);
                }
            return view('backend.users.admins');
            }
        }
        
        return Redirect::back();
    }
    
    //  -----------------  view new admin page  ----------------------
    public function create() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Auth::User()->rank == 1) {
                return view('backend.users.create');
            }
        }
        
        return Redirect::back();
    }
    
    //  ------------------  add new admin  ---------------------------
    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'username' => 'required|min:6|max:40',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password'
        ]);
        
         try {
            $data = User::where('email', $request->input('email'))->count();
            if($data > 0) {
                Session::flash('error', 'Account already Exist');
            }
            else {
                
                $user = new User;
                $user->name = $request->input('username');
                $user->email = $request->input('email');
                $user->password = Hash::make($request->input('password'));
                $user->rank = $request->input('rank');
                $user->verify_key = Hash::make(date('y-m-d-h-i-s').$request->input('email'));
                
                $path = 'uploads/profile/download.png';
                $user->image = $path;
                
                $user->save();
                
                Session::flash('success', 'Account added Successfuly');
            }
        } catch(Exception $e) {
            Session::flash('error', 'Something is wrong'.$e);
        }
        
        return Redirect::back();
    }
    
    //  --------------------- logout - the same from frontend/userCtrl
    
    
    //  ----------------------  view edit profile page  -----------------------
    public function editProfile() {
        
        if(Auth::check() && Auth::User()->rank>0) {
            if(Auth::User()->rank >0){
                return view('backend.users.editProfile');
            }
        }
        
        return Redirect::back();
    }
    
    //  ----------------------  edit profile  ------------------------------
    public function updateProfile(Request $request, $id) {
        
        $validatedData = $request->validate([
            'username' => 'min:6|max:40',
        ]);
        
        try {
            
            if(User::where('id',$id)->count() > 0 ) {
                
                $data = User::where('id',$id)->first();
                $data->name = $request->input('username');
                
                if($request->input('oldPassword') || $request->input('newPassword')) {
                    if( Hash::check($request->input('oldPassword'), $data->password) ) {
                        
                        $validatedData = $request->validate([
                            'newPassword' => 'min:6'
                        ]);
                        $data->password = Hash::make($request->input('newPassword'));
                    }
                    else {
                        Session::flash('error','incorrect password');
                    }
                }

                if($request->file('img')) {
                    File::Delete($data->image);
                    $file = $request->file('img');
                    $path = 'uploads/profile/';
                    $filename = date('y-m-d-h-i-s').'.'.$file->getClientOriginalExtension();
                    $file->move(public_path().'/'.$path,$filename);
                    $data->image = $path.$filename;
                }
                
                $data->save();

                Session::flash('success','profile edited successfully');
                return Redirect::back();
            }
            else {
                Session::flash('error','profile not exist');
            }
        } catch (EXTENSION $e) {
            Session::flash('error','Error:'.$e);
        }
        
    }
    
    // -----------------  delete admin  ---------------------------  
    public function delete($id) {
        
        if(Auth::check() && Auth::User()->rank == 1) {
            if(User::where('id',$id)->count() > 0) {
                if(Auth::User()->id == $id) {
                    Session::flash('error','cannot delete your account');
                }
                else {
                    $data = User::where('id',$id)->first();
                    $data->delete();    
                }

            }
        }
        
        return Redirect::back();
    }
    
    //
}
