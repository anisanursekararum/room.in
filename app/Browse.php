<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Browse extends Model
{
    const UPDATED_AT = 'update_at';

    protected $table = 'rooms';

    protected $fillable = ['title_rooms', 'description_room', 'picture_rooms', 'updated_at', 'created_at', 'update_at'];

}
