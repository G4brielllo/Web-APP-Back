<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estimation extends Model
{
      /**  
    * @var array<int, string>
    */
    protected $fillable = ['name', 'description', 'project_id', 'type', 'amount', 'date'];


    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
    
}
