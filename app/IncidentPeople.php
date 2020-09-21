<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentPeople extends Model
{
    protected $table = 'incident_people';
    protected $fillable = ['name','type','incident_id'];
}
