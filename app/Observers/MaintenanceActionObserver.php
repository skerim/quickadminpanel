<?php

namespace App\Observers;

use App\Models\Maintenance;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class MaintenanceActionObserver
{
    public function created(Maintenance $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Maintenance'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Maintenance $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Maintenance'];
        $users = \App\Models\User::whereHas('roles', function ($q) { return $q->where('title', 'Admin'); })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
