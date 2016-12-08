<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YogaMessages extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection  = 'mysql_main';
}
