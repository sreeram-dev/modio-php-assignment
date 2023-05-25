<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    /**
     * the fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'action',
        'key',
    ];

    // TODO: challenge 3.0
}
