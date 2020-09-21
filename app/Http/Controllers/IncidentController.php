<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\IncidentPeople;
use App\Category;

class IncidentController extends Controller
{
    
    public function allincidents()
    {
        // fetch all Incidents with peoplen data
        $incident = Incident::with('people')->get();
        return response()->json($incident, 200);
    }
    public function store(Request $request){
        
        //validating all input fields
        $validator = \Validator::make($request->all(), $this->rules());
        
        //if validate fails error message will return
        if ($validator->fails()) {
           return response()->json($validator->errors(), 422);
        }
        
        //using Eloquent modal
        $incident = new Incident;

        $incident->latitude = $request->location['latitude'];
        $incident->longitude =$request->location['latitude'];
        $incident->title = $request->title;
        $incident->cat_id = $request->category;
        $incident->comments = $request->comments;
        $incident->incident_date = $request->incidentDate;
        $incident->save();

        //inserting into incident people table
        foreach($request->people as $peoples){
            $comment = $incident->people()->create($peoples);
        }
        return response()->json("success", 200);
    }

    //validation rules
    public function rules()
    {
        return [
            'location' =>'required',
            'title'=>'required',
            'category'=>'required',
            'people' =>'required',
            'comments'=>'required',
            'incidentDate' =>'required|date_format:Y-m-d|after:today',
            'location.latitude'=>'required',
            'location.longitude'=>'required',
            'people.*.name'=>'required',
            'people.*.type'=>'required'
            
        ];
    }
}
