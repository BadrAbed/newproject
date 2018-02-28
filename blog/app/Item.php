<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $fillable=['title','dsec','status','image','price','menu_id','user_id'];
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
  return  $this->belongsTo('App\Item');
  }
}
