<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    public $timestamps = true;
    protected $fillable = ['id_paket','nama_paket', 'harga_paket', 'ket_paket','category_paket'];

    // relasi table dari order
    public function order()
    {
        return $this->hasMany(Order::class,'paket_id');
    }
    
}
