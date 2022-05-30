<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ilan;
use App\Models\User;

class Rezervasyon extends Model
{
    use HasFactory;


    public function ilan()
    {
        return $this->belongsTo(Ilan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
