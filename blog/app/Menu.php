<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  //protected $table='any name';  to store table name

  // to store name of Columns name

    protected $fillable=['title','type','desc','status','image','user_id'];

public function user()
{
return  $this->belongsTo('App\User');
}
public function items(){

  return $this->hasmany('App\Item');
}

}
