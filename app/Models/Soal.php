<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    protected $fillable = [
        'soal',
        'pilA',
        'pilB',
        'pilC',
        'pilD',
        'kunci',
        'status',
        'score'
    ];
}
