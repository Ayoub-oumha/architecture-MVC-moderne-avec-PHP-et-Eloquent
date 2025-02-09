<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    // Define the table associated with the model (optional if it follows naming conventions)
    protected $table = 'users';

    // Define the primary key (optional if it follows naming conventions)
    protected $primaryKey = 'id';

    // Define the fillable attributes (optional)
    protected $fillable = ['name', 'email', 'password'];
    
}