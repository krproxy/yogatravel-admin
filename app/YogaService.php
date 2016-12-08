<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YogaService extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'yoga_points';
    /**
   * The connection name for the model.
   *
   * @var string
   */
   protected $connection  = 'mysql_main';
}
