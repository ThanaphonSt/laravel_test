<?php

namespace Modules\FazwazTest\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\FazwazTest\Entities\Property;
use Modules\FazwazTest\Entities\ProjectName;

class PropertyController extends Controller
{
    public function showProperty(Request $request){
        $propertyData = Property::select()
                        ->with('project')
                        ->with('status')
                        ->with('country')
                        ->with('property')
                        ->paginate(20);
        $result = array();
        
        $result['pagination'] = array(
            'current_page' => $propertyData->currentPage(),
            'last_page' => $propertyData->lastPage(),
            'prev_page_url' => $propertyData->previousPageUrl(),
            'next_page_url' => $propertyData->nextPageUrl(),
            'per_page' => $propertyData->perPage(),
            'from' => 1 + $propertyData->currentPage() * $propertyData->perPage() - $propertyData->count(),
            'to' => $propertyData->currentPage() * $propertyData->perPage(),
            'total' => $propertyData->total(),
        );
        foreach( $propertyData as $prop){
            if( $prop->for_sale == "1"){
                $statSale = "Yes";
            }else{
                $statSale = "No";
            }
            if( $prop->for_rent == "1"){
                $statRent = "Yes";
            }else{
                $statRent = "No";
            }
            
            $result['data'][] = array(
                'title' => $prop->title,
                'description' => $prop->description,
                'bedroom' => $prop->bedroom,
                'bathroom' => $prop->bathroom,
                'project_name' => $prop->project->project_name,
                'property_type' => $prop->property->property_type,
                'status' => $prop->status->status,
                'for_sale' => $statSale,
                'for_rent' => $statRent,
                'country' => $prop->country->country,
                
            );
            
        }


        return $result;
    }
}
 