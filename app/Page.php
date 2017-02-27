<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title','description','slug','user_id','meta','content'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
