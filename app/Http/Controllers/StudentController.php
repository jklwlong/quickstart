<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function test1()
    {
//        查询
//        $student = DB::select('select * from student');
//        var_dump($student);
//        新增
//        $boo = DB::insert('insert into student(name,age) values (?,?)',['sean',18]);
//        var_dump($boo);
//        更新
//        $boo = DB::update('update student set name=? WHERE id=?',['sss',1]);
//        var_dump($boo);
//        删除
//        $boo = DB::delete('delete from student WHERE id=?',[1]);
//        var_dump($boo);
    }

    public function query1()
    {
//        插入数据，参数可为数组（插入多条）
//        $boo = DB::table('student')->insert(
//            ['name'=>'xm','age'=>18]
//        );
//        插入数据返回id
//        $boo = DB::table('student')->insertGetId(
//            ['name'=>'xm1','age'=>18]
//        );
//        var_dump($boo);
    }

    public function query2()
    {
//        $boo = DB::table('student')
//            -> where('id',2)
//            -> update(['name'=>'xm12','age'=>11]);
//         increment自增 decrement为自减
//        $boo = DB::table('student')
//            ->where('id', 12)
//            ->increment('age', 3, ['name' => 'xm123']);
//        var_dump($boo);
    }

    public function query3()
    {
        $boo = DB::table('student')
            ->where('id', '>=', 2)
            ->delete();

    }

    public function query4()
    {
//        获取表中所有数据
//        $boo = DB::table('student')
//            ->get();
//        var_dump($boo);

//        $boo = DB::table('student')
//            ->orderBy('id', 'desc')
//            ->first();
//        多条件查询
//        $boo = DB::table('student')
//            ->whereRaw('id >= ? and age >= ?', [2, 18])
//            ->get();
//        返回指定字段
//        $boo = DB::table('student')
//            ->pluck('name');
//        返回指定字段并以id作为下标
//        $boo = DB::table('student')
//            ->lists('name','id');
//        返回指定字段
//        $boo = DB::table('student')
//            ->select('id', 'name', 'age')
//            ->get();

//        每次查询两条避免内存溢出
//        $boo = DB::table('student')
//            ->chunk(2,function($students){
//                var_dump($students);
//            });
//
//        var_dump($boo);

    }

}