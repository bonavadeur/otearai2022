<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'matches';
    protected $primaryKey = 'id';
    protected $fillable = [
        'team_one', 'team_two', 'goal_one', 'goal_two', 'result', 'challenge'
    ];
}
