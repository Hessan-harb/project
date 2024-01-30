<?php

namespace App\Observers;

use App\Models\Projcet;

class ProjcetObserver
{
    /**
     * Handle the Projcet "created" event.
     */
    public function created(Projcet $projcet): void
    {
        
        $projcet->members()->attach([$projcet->creator_id]);
    }

    /**
     * Handle the Projcet "updated" event.
     */
    public function updated(Projcet $projcet): void
    {
        //
    }

    /**
     * Handle the Projcet "deleted" event.
     */
    public function deleted(Projcet $projcet): void
    {
        //
    }

    /**
     * Handle the Projcet "restored" event.
     */
    public function restored(Projcet $projcet): void
    {
        //
    }

    /**
     * Handle the Projcet "force deleted" event.
     */
    public function forceDeleted(Projcet $projcet): void
    {
        //
    }
}
