<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $table = 'bookings';

    protected $fillable = ['user_id', 'room_id', 'tanggal_booking', 'start_booking', 'end_booking', 'keperluan', 'status_booking', 'updated_at', 'created_at'];

}
