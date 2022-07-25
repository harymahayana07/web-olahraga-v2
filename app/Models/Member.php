<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $primarykey = 'id';
    public $timestamps = true;
    protected $fillable = ['id','nama', 'no_hp', 'email', 'alamat'];

    // relasi dari table order
    public function order()
    {
        return $this->hasMany(Order::class,'id_member');
    }
   
}
