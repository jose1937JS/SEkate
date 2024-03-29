<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class People extends Model
{

    protected $fillable = ['first_name', 'last_name', 'avatar'];
    protected $table 	= 'people';

    public function content()
    {
    	return $this->hasOne(Content::class);
    }

    public function text_content()
    {
    	return $this->hasOne(TextContent::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
