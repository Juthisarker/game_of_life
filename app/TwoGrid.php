<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class TwoGrid extends Model
{
    protected $table = 'gamelife';
    protected $fillable = [
        'id', 'x_axis', 'y_axis', 'data',
    ];
    public $timestamps = false;
}