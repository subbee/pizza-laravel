<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Ez a sor kell
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Ez a sor is kell

class Ingredient extends Model
{
    use HasFactory; // Ez a sor lehet, hogy már ott van

     /**
     * The attributes that are mass assignable.
     * Engedélyezzük a tömeges hozzárendelést ehhez a mezőhöz (Seederhez kell)
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The pizzas that belong to the Ingredient.
     * Kapcsolat a Pizza modellel (sok-sok)
     */
    public function pizzas(): BelongsToMany
    {
        // Megmondjuk a Laravelnek a helyes pivot tábla nevét!
        return $this->belongsToMany(Pizza::class, 'pizza_ingredient');
    }

    /**
     * Ne használja a timestamps (created_at, updated_at) mezőket
     * Mivel az összetevőknek nincs szükségük rájuk.
     */
    public $timestamps = false;
}
