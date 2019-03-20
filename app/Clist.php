<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clist extends Model
{
  protected $table = 'clists';
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $fillable = ['name'];

  public function contacts()
  {
      return $this->belongsToMany('App\Contact', 'contacts_clists', 'clist_id', 'contact_id');
  }
}
