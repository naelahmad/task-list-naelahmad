<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title>Laravel Quickstart - Basic</title>






    <!-- Styles -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <style>

        body {
            font-family: 'Lato';
            font-size:2em;
        }
        .fa-btn {
            margin-right: 6px;
        }
        }
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>

<body id="app-layout">

 @section('master')
        <div class="container">
            @yield('content')
        </div>



    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">

                <div class="panel-heading">

                    New Task

                </div>

<!--
any form should have csrf_field()
-->

                <div class="panel-body">

                    <!-- Display Validation Errors -->
                     @if (count($errors)>0)
                    <div class="alert alert-danger">
                     <ul>
                    @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                    </ul>
                    </div>
                    @endif

                    <!-- New Task Form -->

                    <form action="{{url('tasks')}}" method="POST" class="form-horizontal">
                    @csrf


                        <!-- Task Name -->

                        <div class="form-group">

                            <label for="task-name" class="col-sm-3 control-label">Task</label>



                            <div class="col-sm-6">

                                <input type="text" name="name" id="task-name" class="form-control" value="">

                            </div>

                        </div>



                        <!-- Add Task Button -->

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($tasks)>0)
            <!-- Current Tasks -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current Tasks
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Task</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                        <div>{{$task->name}}</div>
                                        </td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{url('tasks/'.$task->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <form action="#" method="POST">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
        </div>
</div>

    <!-- JavaScripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>

</html>