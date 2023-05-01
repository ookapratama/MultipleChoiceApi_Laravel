<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawab extends Model
{
    use HasFactory;
    protected $fillable = [
        'soal_id',
        'user_id',
        'status',
    ];

    public function soal() {
        return $this->hasOne('\App\Soal', 'id');
    }

    public function user() {
        return $this->hasOne('\App\User', 'id');
    }
}
