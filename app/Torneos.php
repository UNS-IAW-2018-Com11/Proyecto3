<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\Model;

class Torneos extends Eloquent{
  protected $connection = 'mongodb';
  protected $collection = 'torneosmodels';
}
