<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Articles_photo extends Model
{
    //
    /**
     *
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'articles_photo';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

  
}

