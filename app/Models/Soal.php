<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id',
        'soal',
        'pilA',
        'pilB',
        'pilC',
        'pilD',
        'kunci',
        'status',
        'score',
        'jawab'
    ];

    public function kategori() {
        return $this->hasOne(Kategori::class, 'id', 'kategori_id');
    }
}
