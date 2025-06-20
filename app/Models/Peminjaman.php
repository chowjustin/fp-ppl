<?php

namespace App\Models;
use App\Enums\PeminjamanStatusEnum;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $casts = [
        'status' => PeminjamanStatusEnum::class,
    ];
    protected $fillable = ['user_id', 'ruangan_id', 'status', 'purpose'];

    public function user() { 
        return $this->belongsTo(User::class); 
    }

    public function ruangan() { 
        return $this->belongsTo(Ruangan::class); 
    }
}

