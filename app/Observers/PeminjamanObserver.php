<?php

namespace App\Observers;

use App\Models\Peminjaman;
use App\Enums\PeminjamanStatusEnum;

class PeminjamanObserver
{
    /**
     * Handle the Peminjaman "created" event.
     */
    public function created(Peminjaman $peminjaman): void
    {
        //
    }

    /**
     * Handle the Peminjaman "updated" event.
     */
    public function updated(Peminjaman $peminjaman): void
    {
        if ($peminjaman->wasChanged('status') && $peminjaman->status === PeminjamanStatusEnum::APPROVED) {
            \Log::info("Peminjaman #{$peminjaman->id} untuk {$peminjaman->user->name} telah disetujui.");

            $peminjaman->ruangan()->update(['is_available' => false]);
            \Log::info("Ruangan #{$peminjaman->ruangan->id} status diubah menjadi tidak tersedia.");
        }
    }

    /**
     * Handle the Peminjaman "deleted" event.
     */
    public function deleted(Peminjaman $peminjaman): void
    {
        //
    }

    /**
     * Handle the Peminjaman "restored" event.
     */
    public function restored(Peminjaman $peminjaman): void
    {
        //
    }

    /**
     * Handle the Peminjaman "force deleted" event.
     */
    public function forceDeleted(Peminjaman $peminjaman): void
    {
        //
    }
}
