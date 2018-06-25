<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Grade;
use App\Section;

class Student extends Model
{
	protected $fillable = [
    	'name', 'father_name', 'phone_no', 'address', 'grade', 'section'
    ];

    public function grade()
    {
        return $this->belongsTo('App\Grade');
    }

    public function section() {
        return $this->hasMany('App\Section');
    }
}
