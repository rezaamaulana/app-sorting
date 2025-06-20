<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUjian extends Model
{
    use HasFactory;
    protected $table = 'hasil_ujians';
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
