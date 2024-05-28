<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    //dengan menggunakan accessor, kita bisa membuat attribute baru yang bisa dipanggil dengan cara yang sama seperti attribute biasa
    public function getHargaAttribute()
    {
        return 'Rp. ' . number_format($this->price, 0, ',', '.');
    }

    //make static data type
    public static $types = [
        'coffee',
        'non-coffee',
        'tea',
        'dessert'
    ];

    // if image null
    public function getGambarAttribute()
    {
        // asset mengaraha ke public
        return $this->photo ? Storage::url($this->photo) : asset('no-image.png');
    }
}
