<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['user_id', 'course_id', 'students_number', 'created_by', 'code'];

    public function author(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function instructor(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
