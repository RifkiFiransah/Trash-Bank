<?php

namespace App\Filament\Resources\PenarikanResource\Pages;

use App\Filament\Resources\PenarikanResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePenarikan extends CreateRecord
{
    protected static string $resource = PenarikanResource::class;

    // protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    // {
    //     $penarikan = parent::handleRecordCreation($data);

    //     // Kurangi saldo user setelah penarikan dibuat
    //     $user = $penarikan->user;
    //     $user->saldo -= $penarikan->jumlah;
    //     $user->save();

    //     return $penarikan;
    // }
}
