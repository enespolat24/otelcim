<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Ilan extends Model implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,InteractsWithMedia;


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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'ilan_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
