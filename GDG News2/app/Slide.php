<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    
    static public function getActive($num) {
        if($num == 0) {
            $active = '<span class="btn btn-warning">Not Active</span>';
        }
        else {
            $active = '<span class="btn btn-info">Active</span>';
        }
        return $active;
    }
    
    //
}
