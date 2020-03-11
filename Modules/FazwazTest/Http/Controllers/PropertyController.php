<?php

namespace Modules\FazwazTest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
// use Modules\FazwazTest\Enities\Property;
use Modules\FazwazTest\Entities\Property;
use Modules\FazwazTest\Entities\ProjectName;

class PropertyController extends Controller
{
    public function showProperty(Request $request){
        $test = Property::select()->project_name()->get();
        
        return $test;
    }
}
