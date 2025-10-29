<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Szükséges a HasMany kapcsolathoz

class Kategoria extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * Megmondjuk a Laravelnek a tábla nevét (alapból 'kategorias' lenne)
     * @var string
     */
    protected $table = 'kategorias'; // Győződjünk meg róla, hogy a tábla neve 'kategorias'

    /**
     * The primary key associated with the table.
     * Mivel nem 'id' a kulcs, meg kell adni.
     * @var string
     */
    protected $primaryKey = 'nev';

    /**
     * Indicates if the model's ID is auto-incrementing.
     * Mivel a 'nev' string, nem auto-incrementing.
     * @var bool
     */
    public $incrementing = false;

     /**
     * The data type of the primary key.
     * Mivel a kulcs string.
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'nev',
        'ar',
    ];

    /**
     * Indicates if the model should be timestamped.
     * Nincs created_at/updated_at a táblában.
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the pizzas for the kategoria.
     * Egy-a-többhöz kapcsolat a Pizza modellel.
     */
    public function pizzas(): HasMany
    {
        // Meg kell adni a külső kulcsot ('kategorianev') és a helyi kulcsot ('nev')
        return $this->hasMany(Pizza::class, 'kategorianev', 'nev');
    }
}

