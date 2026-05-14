<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

   protected $fillable = ['username', 'birthday', 'picture_path', 'bio', 'user_id'];

   function user () {
       return $this->belongsTo(User::class);
   }

   protected $casts = [
       'birthday' => 'datetime',
   ];
}
