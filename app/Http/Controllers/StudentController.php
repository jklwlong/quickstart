<?php
namespace App\Http\Controllers;

use App\Student;
use Dotenv\Validator;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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

    /**
     * orm操作数据库
     */
    public function orm1()
    {
//        查询全部
//        $boo = Student::all();
//        根据id查询
//        $boo = Student::find(2);
//        根据主键查询有则返回，无则抛错
//        $boo = Student::findOrFail(6);
//        $boo = Student::where('id', '>', 1)
//            ->orderBy('age', 'desc')
//            ->first();
//        每次查n条
//        echo '<pre>';
//        Student::chunk(1, function ($boo){
//            var_dump($boo);
//        });
//        $boo = Student::max('id');
//        var_dump($boo);
    }

    public function orm2()
    {
//        $student = new Student();
//        $student -> name = 'sean3';
//        $student -> age = 21;
//        $boo = $student->save();
//        使用create增加数据
//        $boo = Student::create(['name'=>'wo','age'=>12]);
//        有则查询，无则新增
//        $boo = Student::firstOrCreate(['name'=>'wo1']);
//        有则查询，无则创建实例，可通过条用$boo->save()保存；
//        $boo = Student::firstOrNew(['name'=>'wo1']);
//        var_dump($boo);
    }

    public function orm3()
    {
//        $student = Student::find(2);
//        $student->name = 'kt';
//        $student->save();
//        批量更新
//        Student::where('id', '>', 1)->update(['age'=>40]);

    }

    public function orm4()
    {
//        $student = Student::find(2);
//        $student->delete();
//        主键删除,参数可以为数组[]批量删除
//        Student::destroy(3);
//        按条件删除
//        Student::where('id', '>', 6)->delete();
    }

    /**
     * 表单request
     */
    public function request1(Request $request)
    {
//        echo $request->input('name');
//        获取所有参数
//        $res = $request->all();
//        获取请求类型
//        $request->method();
//        判断请求类型
//        $request->isMethod('get');
//        获取当前url方法
//        $request->url();
    }

    /**
     * session
     */
    public function session1(Request $request)
    {
//        1.用request操作session
//        $request->session()->put('key1','value1');
//        2.辅助函数session()
//        session()->put('key2','value2');
//        3.Session 参数可为数组['key'=>'value']
//        Session::put('key3','value3');
//        存入数组
//        Session::push('key4','a1');
//        Session::push('key4','a2');
//        判断key是否存在
//        Session::has('key11');
//        删除key
//        Session::forget('key1');
//        清空session
//        Session::flush();
//        暂存，只能取一次
//        Session::flash('key-flash', 'value-flash');
    }

    public function session2(Request $request)
    {
//        echo $request->session()->get('key1');
//        echo $request->session()->get('key2');
//        echo Session::get('key3');
//        若key不存在则为默认值
//        echo Session::get('key4','default');
//        取出一次后删掉session
//        var_dump(Session::pull('key4','default'));
//        取出所有session
//        var_dump(Session::all());
//        echo Session::get('key-flash');
    }

    /**
     * response
     */
    public function response()
    {
//        $data = [
//            'errorCode' => 0,
//            'errorMsg' => 'success',
//            'data' => 'sean',
//        ];
//        return response()->json($data);
//        快闪数据只能用一次
//        return redirect('session2')->with('msg','快闪数据');
//        return redirect()->back();
    }


    /**
     * 前置拦截
     */
    public function act0()
    {
        return "即将开始";
    }

    public function act1()
    {
        return "ing1";
    }

    public function act2()
    {
        return "ing2";
    }

    /**
     * 表单
     */
    public function studentList()
    {
        $studentList = Student::paginate(5);
        return view('student.index', ['studentList'=> $studentList]);
    }

    public function studentSave(Request $request)
    {
//        $this->validate($request, [
//            'Student.name' => 'required|min:2|max:20'
//        ], [
//            'required' => ':attribute必填',
//            'min' => ':attribute长度最少为2'
//        ], [
//            'Student.name' => '姓名'
//        ]);
        $validator = \Validator::make($request->input(),[
            'Student.name' => 'required|min:2|max:20'
        ], [
            'required' => ':attribute必填',
            'min' => ':attribute长度最少为2'
        ], [
            'Student.name' => '姓名'
        ]);
        if($validator->fails()){
//            withInput实现数据保持
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->input('Student');
        $student = new Student();
        $student->name = $data['name'];
        $student->save();
        return redirect('studentList')->with('success', '新增成功-');
    }

    public function studentDelete($id)
    {
        $student = Student::find($id);
        if ($student->delete()) {
            return redirect('studentList')->with('success', '删除成功-' . $id);
        } else {
            return redirect('studentList')->with('error', '删除失败-' . $id);
        }
    }

    /**
     * 邮件测试
     */
    public function send()
    {
//        文本邮件
//        Mail::raw('邮件内容测试',function ($message) {
//            $message->from('j******g@163.com','ohay');
//            $message->subject('主题');
//            $message->to('4*****2@qq.com');
//        });
//        html邮件
//        $flag = Mail::send('auth.emails.test', ['name' => 'ohay'], function ($message) {
//            $message->to('4****2@qq.com')->subject('测试邮件');
//        });
//        if ($flag) {
//            echo '发送邮件成功，请查收！';
//        } else {
//            echo '发送邮件失败，请重试！';
//        }
    }

    /**
     * 上传测试
     */
    public function upload(Request $request)
    {
        if ($request->isMethod('post')) {
            $file = $request->file('file');
//            判断文件是否上传成功
            if ($file->isValid()) {
//                原文件名
                $file->getClientOriginalName();
//                扩展名
                $ext = $file->getClientOriginalExtension();
//                mimetype
                $file->getClientMimeType();
//                临时绝对路径
                $realpath = $file->getRealPath();
                $filename = date('Y-m-d-h-i-s').'-'.uniqid().'.'.$ext;
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realpath));
                var_dump($bool);
                exit;
            }
        }
        return view('student.upload');
    }


    /**
     * 缓存
     */
    public function cache1()
    {
//        Cache::put('key1','value1',10);
//        若key存在则失败，key不存在则成功
//        Cache::add('key1','value1',10);
//        永久保存
//        Cache::forever('key2','value2');
//        判断是否存在
//        Cache::has('key1');
    }

    public function cache2()
    {
//        取出缓存
//        $val = Cache::get('key1');
//        取出缓存后删除
//        Cache::pull('key1');
//        var_dump($val);
//        删除缓存，返回boolean值，若key存在返回true，若key不存在返回false
        Cache::forget('key1');
    }

    /**
     * debug
     */
    public function error()
    {
        Log::info("------------info");
        Log::warning("------------warning");
        Log::error("------------error",['name'=>'name', 'age'=>18]);
    }
}