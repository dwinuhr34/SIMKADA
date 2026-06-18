<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportHistory extends Model
{
    protected $fillable = [
        'nama_file',
        'jumlah_data',
        'status',
    ];

    public function perizinans()
    {
        return $this->hasMany(Perizinan::class);
    }
}