<?php

namespace App\Observers;

use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuObserver
{
    /**
     * Handle the Menu "created" event.
     */
    public function created(Menu $menu): void
    {
        //
    }

    /**
     * Handle the Menu "updated" event.
     */
    public function updated(Menu $menu): void
    {
        // ketika data diupdate, maka hapus photo lama jika ada
        if ($menu->getOriginal('photo') !== $menu->photo) {
            Storage::delete($menu->getOriginal('photo'));
        }
    }

    /**
     * Handle the Menu "deleted" event.
     */
    // => deleting() method dieksekusi sebelum data dihapus
    public function deleting(Menu $menu): void
    {
        // jika menu memiliki photo maka hapus pada Storage ketika data dihapus
        if ($menu->photo) {
            Storage::delete($menu->photo);
        }
    }
    // dan deleted method di eksekusi setelah data dihapus
    // public function deleted(Menu $menu): void
    // {
    // apa yang akan dilakukan ketika data dihapus
    // dd($menu);
    // }

    /**
     * Handle the Menu "restored" event.
     */
    public function restored(Menu $menu): void
    {
        //
    }

    /**
     * Handle the Menu "force deleted" event.
     */
    public function forceDeleted(Menu $menu): void
    {
        //
    }
}
