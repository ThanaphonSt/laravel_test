<?php

namespace Modules\FazwazTest\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\Property;

class ProjectName extends Model
{
    protected $fillable = [];
    protected $table = 'project_names';

    public function properties(){
        return $this->hasMany(Property::class);
    }
}
