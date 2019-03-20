<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $table = 'contacts';
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $fillable=['name', 'email'];
  
  public function clists()
  {
      return $this->belongsToMany('App\Clist', 'contacts_clists', 'contact_id', 'clist_id');
  }
  
  
}


