<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class clients extends Model
{
    use HasFactory, Notifiable;
    /**  
    * @var array<int, string>
    */
    //
    protected $fillable = [
        'name',
        'description',
        'logo',
        'country',
        'email',
    ];
}
