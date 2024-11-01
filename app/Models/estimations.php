<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class estimations extends Model
{
      /**  
    * @var array<int, string>
    */
    protected $fillable = [
        'project_id',
        'client_id',
        'name',
        'description',
        'date',
        'type',
        'amount',

    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
}
