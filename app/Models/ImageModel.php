<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageModel extends Model
{
    use HasFactory;

    protected $table = 'images';

    public function data(){
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }

}
