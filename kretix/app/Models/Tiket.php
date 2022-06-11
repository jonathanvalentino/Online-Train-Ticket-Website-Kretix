<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $table = "tiket";
    protected $fillable = [
        'nama_kereta',
        'jenis',
        'asal',
        'tujuan',
        'berangkat',
        'sampai',
        'harga',
        'GA1',
        'GB1',
        'GC1',
        'GA2',
        'GB2',
        'GC2',
        'GA3',
        'GB3',
        'GC3',
        'GA4',
        'GB4',
        'GC4',
        'GA5',
        'GB5',
        'GC5',
        'GA6',
        'GB6',
        'GC6',
        'GA7',
        'GB7',
        'GC7',
    ];

    public function pemesanan()
    {
        return $this->hasMany(
            Pemesanan::class,
            'id_tiket',
            'id'
        );
    }

}
