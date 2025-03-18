<?php

use App\Models\Rental;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('rental.{id}', function ($user, $id) {
    return 1 === 1;
});

