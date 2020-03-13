<?php

namespace Modules\FazwazTest\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\ProjectName;
use Modules\FazwazTest\Entities\Status;
use Modules\FazwazTest\Entities\Country;
use Modules\FazwazTest\Entities\TypeOfProperty;

class Property extends Model
{
    // protected $fillable = [];

    protected $table = 'property';

    public function project(){
        return $this->belongsTo(ProjectName::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function property(){
        return $this->belongsTo(TypeOfProperty::class);
    }

}
