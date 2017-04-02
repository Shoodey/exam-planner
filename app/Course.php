<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['code', 'name', 'created_by', 'course_id'];

    public function author(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function school(){
        return $this->belongsTo('App\School');
    }
}
