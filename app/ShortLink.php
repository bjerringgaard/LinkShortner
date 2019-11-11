<?php
   
namespace App;
   
use Illuminate\Database\Eloquent\Model;

// fillables on DB
class ShortLink extends Model
{
    protected $fillable = [
        'code', 'link'
    ];
}