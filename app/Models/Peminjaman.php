<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = ['status'];

    public function buku_r()
    {
        return $this->belongsTo('App\Models\Buku','buku');
    }

    public function user_r()
    {
        return $this->belongsTo('App\User','user');
    }
}
