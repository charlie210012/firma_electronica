<?php

namespace App\Observers;

use App\Models\tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class tenantObserver
{
    /**
     * Handle the tenant "created" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function created(tenant $tenant)
    {
        User::create([
            'name'=>$tenant->tenant,
            'email'=>$tenant->email,
            'typeUser'=>1,
            'password'=>$tenant->verify,
        ]);
    }

    /**
     * Handle the tenant "updated" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function updated(tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "deleted" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function deleted(tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "restored" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function restored(tenant $tenant)
    {
        //
    }

    /**
     * Handle the tenant "force deleted" event.
     *
     * @param  \App\Models\tenant  $tenant
     * @return void
     */
    public function forceDeleted(tenant $tenant)
    {
        //
    }
}
