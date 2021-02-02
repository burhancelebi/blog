<?php

namespace Celebi\Commands\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];
    protected $table = 'blogs';
}
