<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

use App\User;
use Hash;
use Auth;
use Session;
use Redirect;

class userCtrl extends Controller
{
    
    //  ----------------------  view signup page  ------------
    public function signup() {
        return view('frontend.pages.signup');
    }
    
    //  ----------------------  signup  ----------------------
    public function signupStore(Request $request) {
        
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
                $user->rank = '0';
                $user->verify_key = Hash::make(date('y-m-d-h-i-s').$request->input('email'));
                $user->image = 'uploads/profile/download.png';
                $user->save();
                
                /*
                $row = User::Where('email', $request->input('email'))->first();
                Mail::send('frontend.mails.verify', ['row', $row], function($message) use($row){
                   $message->to($row->email, 'MS')->subject('verify your account'); 
                });
                */
                
                
                Session::flash('success', 'Account registered Successfuly');
            }
        } catch(Exception $e) {
            Session::flash('error', 'Something is wrong'.$e);
        }
        
        return Redirect::to('login');
    }
    
    //  ----------------------  view login page  ----------------------
    public function login() {
        return view('frontend.pages.login');
    }
    
    //  ----------------------  login  ------------------------
    public function doLogin(Request $request) {
        
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        
        try {
            if(User::where('email', $request->input('email'))->count() > 0) {
                $email = $request->input('email');
                $password = $request->input('password');
                
                if(Auth::attempt(['email' => $email, 'password' => $password], true)) {
                    $user = User::where(['email' => $email, 'password' => $password])->first();
                   
                    if(Auth::User()->rank == 0){
                        return Redirect::to('/')->withuser($user);
                    }
                    else {
                        return Redirect::to('dashboard')->withuser($user);
                    }
                    
                }
                else {
                    Session::flash('error', 'email or password incorrect');
                    return Redirect::back();
                }
                
            }
            else {
                Session::flash('error', 'Account not exist');
                return Redirect::back();
            }
        } catch(Exception $e) {
            Session::flash('error', 'Something is wrong'.$e);
        }
                
    }
    
    //  ----------------------  logout  ---------------------------
    public function logout() {
        Auth::logout();
        return Redirect::to('/');
    }
    
    //  ----------------------  view forget password page  ---------------
    public function forgetPassword() {
        
        return view('frontend.pages.forget_password');
    }
    
    //  ----------------------  forget password  -------------------------
    public function doForget(Request $request) {
       
        $validatedData = $request->validate([
            'email' => 'required|email',
        ]);
        
        $email = $request->input('email');
        if(User::where('email',$email)->count() > 0) {
            $data = User::where('email',$email)->first();
            Session::flash('success',
                           '<a href='.url("reset/".$data->remember_token) .'>'.url($data->remember_token) .'</a>');
        }
        else {
            Session::flash('error','email not exist');
        }
        
        return Redirect::back();
    }
    
    //view reset password page
    public function resetPass($user) {
        
        if(User::where('remember_token', $user)->count() > 0) {
            return view('frontend.pages.reset_password');
        }
        
        return Redirect::back();
    }
    
    //  ----------------------  reset password  -----------------------
    public function doReset(Request $request, $user) {
        
        $validatedData = $request->validate([
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password'
        ]);
        
        try {
            $data = User::where('remember_token', $user)->count();
            if($data > 0) {
                $data = User::where('remember_token', $user)->first();
                $data->password = Hash::make($request->input('password'));
                $data->save();
                
                Session::flash('success', 'Password reset Successfuly');
                return Redirect::to('login');
            }
            else {
                Session::flash('error', 'Account not Exist');
            }
        } catch(Exception $e) {
            Session::flash('error', 'Something is wrong'.$e);
        }
        
        return Redirect::back();
    }
    
    //  ----------------------  view edit profile page  -----------------------
    public function editProfile() {
        
        if(Auth::check()) {
            if(Auth::User()->rank == 0){
                return view('frontend.pages.editProfile');
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
    
    //
}
