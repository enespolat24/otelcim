<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervation extends Model
{
    protected $fillable = ['oda_id', 'user_id', 'baslangic', 'bitis', 'total_gun', 'fiyat','total'];

    public function ilan()
    {
        return $this->belongsTo(Ilan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
