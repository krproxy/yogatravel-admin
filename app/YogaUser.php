<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YogaUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
   * The connection name for the model.
   *
   * @var string
   */
   protected $connection  = null;

  function __construct() {
      $this->connection = env('DB_CONNECTION_TYPE', 'mysql_test');
  }
}
