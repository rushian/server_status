<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
	protected $fillable = ['id_usuario','ip','servidor', 'created_at', 'created_by', 'updated_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
