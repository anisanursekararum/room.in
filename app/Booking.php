<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $fillable = ['user_id', 'room_id', 'tanggal_booking', 'start_booking', 'end_booking', 'keperluan', 'status_booking', 'updated_at', 'created_at'];

    public $timestamps = true;
}
