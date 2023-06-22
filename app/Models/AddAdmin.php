<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_name',
        'project_id',
        'user_id', 
    ];
}