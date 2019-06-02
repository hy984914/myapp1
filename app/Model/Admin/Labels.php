<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Labels extends Model
{
    protected $table = 'labels';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
