<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';
//    指定允许批量赋值字段
    protected $fillable = ['name', 'age'];
//    不允许批量赋值字段
//    protected $guarded = [];
    public $timestamps = true;
//    protected function getDateFormat()
//    {
//        return time();
//    }
//    protected function getDateFormat($val)
//    {
//        return $val;
//    }
}