<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $table = 'pembeli';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = ['id','no_hp', 'nama', 'umur', 'alamat'];

    public function paket()
    {
        return $this->hasMany(Paket::class);
    }
}
