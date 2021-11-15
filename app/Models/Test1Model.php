<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test1Model extends Model
{
    use HasFactory;

    protected $table = 'test1';

    public function data(){
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
