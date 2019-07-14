<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Section;
use App\News;
use App\Comment;
use App\Video;
use Redirect;
use Auth;

class appCtrl extends Controller
{
    
    // ------------------  view home page  -----------------
    public function index() {
        
        if(News::count() > 0 && Video::count() > 0) {
            $news = News::where('active', 1)->OrderBy('created_at', 'DESC')->take(6)->get();
            $videos = Video::where('active', 1)->OrderBy('created_at', 'DESC')->take(6)->get();
            
            return view('frontend.layout.index')->withnews($news)->withvideos($videos);
        }
        
        return view('frontend.layout.index');
    }
    
    // ----------------  view sections page  -------------------
    public function sectionPage($name) {
        
        if(Section::where('name',$name)->count() > 0) {
            $sec = Section::where('name',$name)->first();
            
            if(News::where('section',$sec->id)->count() > 0) {
                $data = News::where(['section' => $sec->id, 'active' => 1])->get();
                return view('frontend.pages.sections')->withdata($data);
            }
            else {
                return Redirect::to('/');
            }
        }
        else {
            return Redirect::to('/');
        }
        
    }
    
    // --------------  view news detailes page  --------------
    public function detailes($newsid) {
        
        if(News::where('id',$newsid)->count() > 0) {
            $data = News::where('id',$newsid)->first();
            $seealso = News::where('section','like','%'.$data->section.'%')->take(4)->get();
            
            if(Comment::where('news_id',$newsid)->count() > 0) {
                $comment = Comment::where('news_id',$newsid)->OrderBy('created_at','DESC')->get();
                return view('frontend.pages.newsDetailes')->withdata($data)
                                                          ->withseealso($seealso)
                                                          ->withcomment($comment);
            }
            
            return view('frontend.pages.newsDetailes')->withdata($data)->withseealso($seealso);
        }
        else {
            return Redirect::back();
        }
        
    }
    
    // ----------------  add news comment  ----------------------
    public function storeComment(Request $request, $newsid) {
        
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);
        
        if(Auth::check() && Auth::User()->rank == 0) {
            $data = new Comment;
            $data->news_id = $newsid;
            $data->user_id = Auth::User()->id;
            $data->comment = $request->input('comment');
            $data->save();
        }
                    
        return Redirect::back() ;
    }
    
    // ----------------  delete news comment  ----------------------
    public function deleteComment($commentid) {
        
        if(Auth::check() && Auth::User()->rank == 0) {
            if(Comment::where('id',$commentid)->count() > 0) {
                
                $data = Comment::where('id',$commentid)->first();
                if(Auth::User()->id == $data->user_id) {
                    $data->delete();
                }
                
            }
        }
                    
        return Redirect::back() ;
    }
    
    // ----------------  view videos page  -------------------
    public function videoPage() {
        
        if(Video::count() > 0) {
            $data = Video::where('active', 1)->OrderBy('created_at','Desc')->get();
            return view('frontend.pages.videos')->withdata($data);
        }
        
        return Redirect::to('/');
    }
    
    // --------------  view video detailes page  --------------
    public function videoDetailes($videoid) {
        
        if(Video::where('id',$videoid)->count() > 0) {
            $data = Video::where('id',$videoid)->first();
            $seealso = Video::where('section','like','%'.$data->section.'%')->take(4)->get();
            
            if(Comment::where('news_id',$videoid)->count() > 0) {
                $comment = Comment::where('news_id',$videoid)->OrderBy('created_at','DESC')->get();
                return view('frontend.pages.videoDetailes')->withdata($data)
                                                          ->withseealso($seealso)
                                                          ->withcomment($comment);
            }
            
            return view('frontend.pages.videoDetailes')->withdata($data)->withseealso($seealso);
        }
        else {
            return Redirect::back();
        }
        
    }
    
    //
    
}
