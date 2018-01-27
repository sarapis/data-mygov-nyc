<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Contact extends Model
{
	use Sortable;

    protected $table = 'contacts';

    public $timestamps = false;

}
