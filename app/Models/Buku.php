<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'books';
    
    public function category_r()
    {
        return $this->belongsTo('App\Models\Category','kategory');
    }
}
