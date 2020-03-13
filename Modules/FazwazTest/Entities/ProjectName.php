<?php

namespace Modules\FazwazTest\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\Property;

class ProjectName extends Model
{
    // protected $fillable = ['Project_id'];
    protected $table = 'project_names';

    public function property(){
        return $this->hasMany(Property::class);
    }
}
