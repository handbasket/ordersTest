<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public static function findByIdentityName($name)
    {
        return self::query()->where('name', '=', $name)->first();
    }
}
