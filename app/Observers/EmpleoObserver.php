<?php

namespace App\Observers;

use App\Models\Empleo;
use Illuminate\Support\Facades\Storage;

class EmpleoObserver
{
    /**
     * Handle the Empleo "created" event.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return void
     */
    public function creating(Empleo $empleo)
    {
        if (! \App::runningInConsole()) {
            $empleo->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Empleo "updated" event.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return void
     */
    public function updated(Empleo $empleo)
    {
        //
    }

    /**
     * Handle the Empleo "deleted" event.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return void
     */
    public function deleting(Empleo $empleo)
    {
        if ($empleo->image) {
            Storage::delete($empleo->image->url);
        }
    }

    /**
     * Handle the Empleo "restored" event.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return void
     */
    public function restored(Empleo $empleo)
    {
        //
    }

    /**
     * Handle the Empleo "force deleted" event.
     *
     * @param  \App\Models\Empleo  $empleo
     * @return void
     */
    public function forceDeleted(Empleo $empleo)
    {
        //
    }
}
