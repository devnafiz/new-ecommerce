<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubImage extends Model
{
    public function subImage()
    {
    	return $this->belongsTo(Size::class,'size_id','id');
    }
}
