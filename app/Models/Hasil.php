<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $fillable = [
        'jawab_id',
        'total_score',
        'status',
    ];

    public function jawab() {
        return $this->hasOne('\App\Jawab', 'id');
    }

}
