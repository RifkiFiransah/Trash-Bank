<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setoran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::saved(function ($setoran) {
            $user = $setoran->user; // Mendapatkan user terkait
            $user->saldo += $setoran->total; // Mengurangi saldo
            $user->jumlah_setoran += 1;
            $user->save(); // Menyimpan perubahan saldo
        });
    }

    /**
     * Get the user that owns the Setoran
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sampah(): BelongsTo
    {
        return $this->belongsTo(Sampah::class, 'sampah_id');
    }
}
