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

});

