<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Partner extends Model
{
    protected $fillable = [
        'user_id', 'partner_id'
    ];
}
