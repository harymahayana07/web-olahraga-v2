<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'id_order';
    public $timestamps = true;
    protected $fillable = ['id_order','id_member','no_hp', 'paket_id', 'status','alamat'];

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'paket_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }
}
