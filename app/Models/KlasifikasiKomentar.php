<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Komentar;

class KlasifikasiKomentar extends Model
{
    protected $table = 'klasifikasi_komentar';

    protected $fillable = [
        'komentar_id', 'preproses_komentar', 'nilai_positif', 'nilai_negatif', 'klasifikasi',
    ];

    public function komentar()
    {
        return $this->belongsTo(Komentar::class, 'komentar_id', 'id');
    }
}
