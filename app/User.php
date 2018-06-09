<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable{
  protected $connection = 'mongodb';
  protected $collection = 'usersmodels';

  protected $fillable = [
    'name', 'email', 'password', 'class'
  ];
}
