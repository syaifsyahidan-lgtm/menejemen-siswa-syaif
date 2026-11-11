<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'kelas',
        'email',
        'alamat',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
