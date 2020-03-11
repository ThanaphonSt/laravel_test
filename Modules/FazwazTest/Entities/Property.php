<?php

namespace Modules\FazwazTest\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\FazwazTest\Entities\ProjectName;

class Property extends Model
{
    // protected $fillable = [];

    protected $table = 'property';

    public function project_name(){

        return $this->belongsTo(ProjectName::class);
    }

}
