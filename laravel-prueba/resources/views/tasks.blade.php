<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>


    <!-- TODO: Current Tasks -->
     @if (count($tasks) > 0)
        <div class="panel panel-default" style=" width: 600px; margin:0 auto">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text" style=" width: 80%; ">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td style=" Display: flex; ">
                                    <!-- TODO: Delete Button -->
                                    @if ($task -> done==0)
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}

                                            <button type="submit" class="btn btn-danger" name="done" style="background-color: #32E186; border:none;  ">
                                                Done
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('POST') }}

                                            <button type="submit" class="btn btn-danger" name="done" style="background-color: #E64452; border:none;  ">
                                                No Done
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ url('task/'.$task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger" style="border:none">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


@endsection
