<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc') -> get()
        ]);
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });

    /**
     * mytest
     */
    Route::get('/user/{id}', [
        'uses' => 'UserController@info',
        'as' => 'userinfo']);

    /**
     * studenttest
     */
    Route::get('test1', ['uses' => 'StudentController@test1']);

    /**
     * querytest
     * 查询构造器
     */
    Route::get('query1', ['uses' => 'StudentController@query1']);
    Route::get('query2', ['uses' => 'StudentController@query2']);
    Route::get('query3', ['uses' => 'StudentController@query3']);
    Route::get('query4', ['uses' => 'StudentController@query4']);

    /**
     * orm
     */
    Route::get('orm1', ['uses' => 'StudentController@orm1']);
    Route::get('orm2', ['uses' => 'StudentController@orm2']);
    Route::get('orm3', ['uses' => 'StudentController@orm3']);
    Route::get('orm4', ['uses' => 'StudentController@orm4']);

    /**
     * request
     */
    Route::get('request1', ['uses' => 'StudentController@request1']);

    /**
     * session
     */
    Route::get('session1', ['uses' => 'StudentController@session1']);
    Route::get('session2', ['uses' => 'StudentController@session2']);

    /**
     * response
     */
    Route::get('response', ['uses' => 'StudentController@response']);


    /**
     * 中间件
     * act
     */
    Route::get('act0', ['uses' => 'StudentController@act0']);
    Route::group(['middleware' => ['act']], function () {
        Route::get('act1', ['uses' => 'StudentController@act1']);
        Route::get('act2', ['uses' => 'StudentController@act2']);
    });

    /**
     * 表单
     */
    Route::get('studentList', ['uses' => 'StudentController@studentList']);
    Route::post('studentSave', ['uses' => 'StudentController@studentSave']);
    Route::any('student/delete/{id}', ['uses' => 'StudentController@studentDelete']);

    /**
     * 邮件测试
     */
    Route::any('send', ['uses' => 'StudentController@send']);

    /**
     * 上传测试
     */
    Route::any('upload', ['uses' => 'StudentController@upload']);

    /**
     * auth
     */
    Route::auth();
    Route::get('/home', 'HomeController@index');

});

