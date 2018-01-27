<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $table = 'agencies';
    public $timestamps = false;

    public function commitment()
    {
        return $this->belongsTo('App\Models\Commitments', 'commitment_id');
    }
}
