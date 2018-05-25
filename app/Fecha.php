<?php namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Eloquent{
  protected $connection = 'mongodb';
  protected $collection = 'fechasmodels';


  public function partido()
  {
      return $this->hasMany('App\Partido');
  }

}
