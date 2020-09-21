<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    protected $fillable = ['latitude','longitude','title','cat_id','comments','incident_date'];

    public function people()
    {
        return $this->hasMany('App\IncidentPeople','incident_id','id');
    }
   
}
