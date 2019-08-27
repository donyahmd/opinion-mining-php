<?php

namespace App\Models\Mining;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $table = 'dictionary';

    protected $fillable = [
        'kata', 'kelas'
    ];
}
