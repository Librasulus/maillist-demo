<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
  protected $table = 'mails';
  protected $primaryKey = 'id';
  public $timestamps = true;
  protected $guarded = ['id'];
  protected $fillable=['name', 'subject', 'body', 'clist_id'];
    
  public function clist()
  {
      return $this->belongsTo('App\Clist');
  }
    
}
