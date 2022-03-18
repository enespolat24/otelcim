<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Ilan extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Ilanlar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'baslik',
        'aciklama',
        'fiyat',
        'kira_sure_gun',
        'kisi_kontenjani',
        'sehir',
        'ilce',
        'adres',
        'user_id'
    ];

    public function user(){
       return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
