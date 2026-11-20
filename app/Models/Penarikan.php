<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penarikan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::saved(function ($penarikan) {
            $user = $penarikan->user; // Mendapatkan user terkait
            $user->saldo -= $penarikan->jumlah; // Mengurangi saldo
            $user->jumlah_penarikan += 1;
            $user->save(); // Menyimpan perubahan saldo
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
