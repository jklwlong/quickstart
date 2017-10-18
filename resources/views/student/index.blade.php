@extends('layouts.app')
@section('head')
    @parent parent
@stop
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                    <form action="{{ url('studentSave')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="Student[name]" id="task-name" class="form-control" value="{{old('Student')['name']}}">
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($studentList) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>id</th>
                            <th>姓名</th>
                            <th>创建时间</th>
                            </thead>
                            <tbody>
                            @foreach ($studentList as $student)
                                <tr>
                                    <td class="table-text"><div>{{ $student->id }}</div></td>
                                    <td class="table-text"><div>{{ $student->name }}</div></td>
                                    <td class="table-text"><div>{{ date_format($student->created_at,'Y-m-d') }}</div></td>
                                    <td>
                                        <a class="btn btn-danger"
                                           href="{{ url('student/delete',['id'=>$student->id]) }}"
                                           onclick="if(confirm('确定删除吗？')==false) return false;">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pull-right pagination-lg">
                            {{--{!! $studentList->appends(['sort' => 'votes'])->render() !!}--}}
                            {!! $studentList->render() !!}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
