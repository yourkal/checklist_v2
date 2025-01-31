<?php

// Model for Checklist
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model {
    use HasFactory;
    protected $fillable = ['tanggal', 'deskripsi_pekerjaan', 'jam_inspeksi', 'nama_pic', 'status_pekerjaan','tahun','bulan','area'];
    protected $casts = [
        'status_pekerjaan' => 'array',
    ];
}
