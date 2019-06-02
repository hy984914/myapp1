<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    /**
     *
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'articles';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    public function gm()
    {
        return $this->hasMany('App\Model\Admin\articles_photo','gid','id');
    }
}
