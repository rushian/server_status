<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
	protected $fillable = ['id_usuario', 'updated_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
