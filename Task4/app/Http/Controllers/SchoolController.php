<?php

namespace App\Http\Controllers;

use App\Models\School; 

class SchoolController extends Controller
{ 
    /* get school list by country */
    public function getSchools($selectedValue)
    { 
        $options = School::where('country_id', $selectedValue)->get(); 
        return response()->json($options);
    }
 
}
