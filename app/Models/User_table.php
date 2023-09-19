<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_table extends Model
{
    public $table = 'users';
    public $primaryKey = 'uid';
    public $incrementing = true;
    public $timestamps = false;
}
