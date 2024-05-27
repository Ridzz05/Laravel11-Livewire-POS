<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'desc',
        'type',
        'photo',
    ];

    //Helper harga format, agar bisa dipanggil dengan $menu->harga karena menggunakan nama attribute -> get(NamaYangDigunakan)Attribute
    public function gethargaAttribute()
    {
        return 'Rp. ' . number_format($this->price, 0, ',', '.');
    }
}
