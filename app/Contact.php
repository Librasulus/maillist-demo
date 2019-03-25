<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Contact extends Model
{
  use Sortable;
  
  protected $table = 'contacts';
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $fillable=['name', 'email'];
  
  public $sortable = ['name', 'email', 'clist_id'];
  
  public function clists()
  {
      return $this->belongsToMany('App\Clist', 'contacts_clists', 'contact_id', 'clist_id');
  }
  
  
}


