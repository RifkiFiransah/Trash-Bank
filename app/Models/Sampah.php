<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Sampah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::deleted(function($sampah){
            if($sampah->image){
                Storage::disk('public')->delete($sampah->image);
            }
        });
    }

    public function penjualans(): HasMany{
        return $this->hasMany(Penjualan::class);
    }

    public function setorans(): HasMany{
        return $this->hasMany(Setoran::class);
    }
}
