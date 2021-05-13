<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = "current_teams";
    public function association_color()
    {
        return $this->hasOne(AssociationColor::class, 'team_name', 'team_name');
    }
    public function icon_color()
    {
        return $this->hasOne(IconColor::class, 'team_name', 'team_name');
    }
    public function statement_color()
    {
        return $this->hasOne(StatementColor::class, 'team_name', 'team_name');
    }
    public function city_color()
    {
        return $this->hasOne(CityColor::class, 'team_name', 'team_name');
    }
    public function earned_color()
    {
        return $this->hasOne(EarnedColor::class, 'team_name', 'team_name');
    }
    public function classic_color()
    {
        return $this->hasOne(ClassicColor::class, 'team_name', 'team_name');
    }
    public function current_player()
    {
        return $this->hasMany(CurrentPlayer::class, 'team_name', 'team_name');
    }
    public function historic_player()
    {
        return $this->hasMany(HistoricPlayer::class, 'team_name', 'team_name');
    }
    public function retired_number()
    {
        return $this->hasMany(RetiredNumber::class, 'team_name', 'team_name');
    }
    public function other_name()
    {
        return $this->hasMany(RetiredNumber::class, 'team_name', 'team_name');
    }
}
