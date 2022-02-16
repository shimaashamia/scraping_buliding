<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Home extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'homes';
    public $guarded = [];

    public function images(){
        return $this->hasMany(Image::class);
    }
}
