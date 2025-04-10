<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class InvitationCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'code',
      'user_id',
    ];
}
