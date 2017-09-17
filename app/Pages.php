<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages extends Model
{
    use SoftDeletes;

    protected $table = 'pages';

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
