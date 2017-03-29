<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Roles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [];
    protected $hidden = ['password', 'remember_token'];

    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function roles() {
        return $this->hasMany(Role::class);
    }
}
