<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    protected $fillable = ['client_id', 'name', 'description'];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function Estimation()
    {
        return $this->hasMany(Estimation::class);
    }
}
