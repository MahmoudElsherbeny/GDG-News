<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    
    static public function getActive($id) {
        $sec = self::where('id',$id)->first();
        if($sec->active == 0) {
            $active = '<span class="btn btn-warning">Not Active</span>';
        }
        else {
            $active = '<span class="btn btn-info">Active</span>';
        }
        return $active;
    }
    
    //get section name
    static public function getSectionName($id) {
        
        $sec = self::where('id',$id)->first();
        $name = '<span class="btn btn-primary">'. $sec->name .'</span>';
        
        return $name;
    }
    
    static public function getSection($id) {
        $sec = self::where('id',$id)->first();
        $name = $sec->name;
        
        return $name;
    }
    
}
