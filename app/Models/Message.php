<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function sender()
    {
        return $this->users()->where('action','send')->first();
    }

    public function receiver()
    {
        return $this->users()->where('action','receive')->first();
    }

}
