<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama', // sudah ada
        'stb', // sudah ada
        'email', // sudah ada
        'tempat_lahir',        
        'tgl_lahir',        
        'agama',        
        'jkl',        
        'no_hp', // sudah ada       
        'alamat', // sudah ada       
        'asal_sekolah',        
        'nm_ayah',        
        'nm_ibu',        
        'angkatan_kampus',     
        'registrasi_ulang', // sudah ada nilai default
        'status', // sudah ada nilai default 
        'pengalaman_organisasi',        
        'alasan_daftar',        
        'pas_foto',        
        // 'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
