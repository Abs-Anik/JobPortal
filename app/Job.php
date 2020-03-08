<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public const JOB_CATEGORY = array('it' => 'IT', 'network' => 'Network', 'software' => 'Software');

    function user() {
        return $this->belongsTo("App\User");
    }

    function applications() {
    	return $this->hasMany('App\JobApplication');
    }
}
