<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Ez a sor kell
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Ez a sor is kell

class Pizza extends Model
{
    use HasFactory; // Ez a sor lehet, hogy már ott van

    /**
     * The attributes that are mass assignable.
     * Engedélyezzük a tömeges hozzárendelést ezekhez a mezőkhöz (Seederhez kell)
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_path', // Ha használsz képet
    ];

    /**
     * The ingredients that belong to the Pizza.
     * Kapcsolat az Ingredient modellel (sok-sok)
     */
    public function ingredients(): BelongsToMany
    {
        // Megmondjuk a Laravelnek a helyes pivot tábla nevét!
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient');
    }
}
