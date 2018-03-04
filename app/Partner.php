<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Friend extends Model
{
    protected $fillable = [
        'user_id', 'partner_id'
    ];
}
