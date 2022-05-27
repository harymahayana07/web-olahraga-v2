<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    protected $table = 'gym';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['id', 'nama_paket', 'harga_paket', 'jumlah_paket', 'ket_paket'];
}
