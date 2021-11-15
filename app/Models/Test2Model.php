<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test2Model extends Model
{
    use HasFactory;

    protected $table = 'test2';


    /**
     * 获取模型的路由键值
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->age;
    }
}
