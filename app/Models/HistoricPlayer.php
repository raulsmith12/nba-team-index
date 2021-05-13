<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricPlayer extends Model
{
    public function teams()
    {
        return $this->belongsTo(Team::class, 'team_name', 'team_name');
    }
}
