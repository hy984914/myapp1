<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Sorts extends Model
{
    protected $table = 'sorts';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
