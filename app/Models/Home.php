<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public function section(){
        return $this -> belongsTo(Section::class);
    }

    public function product(){
        return $this -> belongsTo(Product::class);
        
    }
}
