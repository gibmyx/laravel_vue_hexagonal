<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articulos';
    protected $fillable = [
        'title',
        'content'
    ];
    protected $guarded = ['id'];


}
