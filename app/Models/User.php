<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;
    //definir que campo de la table es la llave primeria
    protected $primaryKey = 'user';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user', 'nombre', 'rol'
    ];

    protected $hidden = [
        'pass', 'created_at', 'updated_at'
    ];
}
