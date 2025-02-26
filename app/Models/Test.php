<?php
namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class Test extends Model
{
    protected $table = 'test';
    protected $primaryKey = 'id';

    public $timestamps = false; # this mean the table does not have time stamp

    protected $fillable = [
        'name',
        'status',
    ];

}
