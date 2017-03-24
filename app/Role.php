<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Laravel\Passport\Client;

class Role extends Model
{
    protected $table="roles";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function application() {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
