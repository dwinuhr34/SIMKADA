<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    protected $fillable = [
        'import_history_id',
        'nomor_izin',
        'nomor_skrd',
        'tanggal_izin',
        'nama_perusahaan',
        'alamat',
        'jenis_izin',
        'lokasi_perusahaan',
        'masa_berlaku_izin',
        'tanggal_bayar',
        'keterangan',
    ];

    public function importHistory()
    {
        return $this->belongsTo(ImportHistory::class);
    }
}