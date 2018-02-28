<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
  protected $fillable=['title','dsec','status','image','price','user_id'];
  public function user()
  {
  return  $this->belongsTo('App\User');
  }
  public function menu()
  {
  return  $this->belongsTo('App\Menu');
  }
  public function item()
  {
  return  $this->belongsTo('App\Menu');
  }

}
