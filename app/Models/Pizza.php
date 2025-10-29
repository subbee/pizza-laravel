<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Ez a sor kell
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Szükséges a BelongsTo kapcsolathoz
use Illuminate\Database\Eloquent\Relations\HasMany;   // Szükséges a HasMany kapcsolathoz

class Pizza extends Model
{
    use HasFactory; // Ez a sor lehet, hogy már ott van

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
     * Engedélyezzük a tömeges hozzárendelést (Seederhez kell).
     * @var array<int, string>
     */
    protected $fillable = [
        'nev',
        'kategorianev',
        'vegetarianus',
    ];

    /**
     * Indicates if the model should be timestamped.
     * Nincs created_at/updated_at a táblában.
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the kategoria that owns the Pizza.
     * Több-az-egyhez kapcsolat a Kategoria modellel.
     */
    public function kategoria(): BelongsTo
    {
        // Meg kell adni a külső kulcsot ('kategorianev') és a tulajdonos kulcsát ('nev')
        return $this->belongsTo(Kategoria::class, 'kategorianev', 'nev');
    }

    /**
     * Get the rendeles records for the pizza.
     * Egy-a-többhöz kapcsolat a Rendeles modellel.
     */
    public function rendelesek(): HasMany
    {
        // Meg kell adni a külső kulcsot ('pizzanev') és a helyi kulcsot ('nev')
        return $this->hasMany(Rendeles::class, 'pizzanev', 'nev');
    }

    /**
     * The attributes that should be cast.
     * Automatikusan konvertálja a 'vegetarianus' mezőt boolean-re.
     * @var array
     */
    protected $casts = [
        'vegetarianus' => 'boolean',
    ];
}

