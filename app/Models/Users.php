<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/***
 * Class Users
 * @package App\Models
 */
class Users extends Model
{
    /***
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

}
