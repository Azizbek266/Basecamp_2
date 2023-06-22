<?php

namespace App\Models;

use App\Models\Comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
