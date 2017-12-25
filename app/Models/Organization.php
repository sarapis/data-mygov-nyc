<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Organization extends Model
{
	use Sortable;
    protected $table = 'organizations';

}
