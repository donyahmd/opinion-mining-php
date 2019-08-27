<?php

namespace App\Models\Mining;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'klasifikasi';

    protected $fillable = ['kelas', 'nilai_probabilitas'];
    public $timestamps = false;
}
