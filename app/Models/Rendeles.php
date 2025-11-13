<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Szükséges a BelongsTo kapcsolathoz

class Rendeles extends Model
{
    use HasFactory;

     /**
     * The table associated with the model.
     * Megmondjuk a Laravelnek a tábla nevét (alapból 'rendelesek' lenne)
     * @var string
     */
    protected $table = 'rendeles'; // Fontos, mert a migrációban 'rendeles' a név



    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'pizza_id',
        'user_id',
        'darab',
        'cim',
        'felvetel',
        'kiszallitas',
    ];

    /**
     * Indicates if the model should be timestamped.
     * @var bool
     */
    public $timestamps = false; // Nincs created_at/updated_at

     /**
     * The attributes that should be cast.
     * Automatikusan konvertálja a dátum mezőket Carbon objektumokká.
     *
     * @var array
     */
    protected $casts = [
        'felvetel' => 'datetime',
        'kiszallitas' => 'datetime',
    ];

    /**
     * Get the pizza that owns the Rendeles.
     * Több-az-egyhez kapcsolat a Pizza modellel.
     */
    public function pizza(): BelongsTo
    {
        // Meg kell adni a külső kulcsot ('pizzanev') és a tulajdonos kulcsát ('nev')
        return $this->belongsTo(Pizza::class, 'pizza_id', 'id');
    }
    public function user(): BelongsTo
    {
        // Meg kell adni a külső kulcsot ('pizzanev') és a tulajdonos kulcsát ('nev')
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

