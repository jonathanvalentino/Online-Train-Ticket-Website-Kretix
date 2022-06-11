<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = "pemesanan";
    protected $fillable = [
        'id_tiket',
        'user_id',
        'nama_pemesan',
        'jumlah_orang',
        'nama_kereta',
        'jenis_kereta',
        'asal',
        'tujuan',
        'tanggal_berangkat',
        'jam_berangkat',
        'harga',
        'nama1',
        'nama2',
        'nama3',
        'nama4',
    ];
    public function tiket()
    {
        return $this->belongsTo(
            Tiket::class,
            'id_tiket',
            'id'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}
