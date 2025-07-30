<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isInt;

class Penjualan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted(){
        static::saved(function($penjualan){
            // Only run this logic when user is authenticated (not during seeding)
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
                if ($user) {
                    $user->jumlah_setoran += 1;
                    $user->saldo += $penjualan->total;
                    $user->save();
                }
            }
        });
    }

    public function sampah(): BelongsTo {
        return $this->belongsTo(Sampah::class, 'sampah_id');
    }
}
