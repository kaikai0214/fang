<?php

namespace App\Observers;

use App\Jobs\AdminJob;
use App\Models\Admin;
use Illuminate\Mail\Message;
use Mail;

class AdminObserver
{
    /**
     * Handle the admin "created" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function created(Admin $admin)
    {
        dispatch(new AdminJob($admin));
    }

    /**
     * Handle the admin "updated" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function updated(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "deleted" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function deleted(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "restored" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function restored(Admin $admin)
    {
        //
    }

    /**
     * Handle the admin "force deleted" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function forceDeleted(Admin $admin)
    {
        //
    }
}
