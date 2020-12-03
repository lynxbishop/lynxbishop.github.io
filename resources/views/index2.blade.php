@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h5 class="mb-2 mt-2">
                    <table class="table-bordered table mb-0">
                        <tr><td class="text-nowrap">Query</td><td class="w-100">
                                <code>
                                    $user_data = User::get();<br/>
                                    foreach($user_data as $key => &$data){<br>
                                    &emsp;&emsp;$data->completed = Todo::where(['completed'=>1,'userId'=>$data->id])->count();<br>
                                    }
                                </code>
                            </td>
                        </tr>
                        <tr><td class="text-nowrap">Render Time</td><td>{{ round(microtime(true) - LARAVEL_START,4) }} seconds</td></tr>
                        <tr><td class="text-nowrap">Using View</td><td>false</td></tr>
                    </table>
                </h5>
            </div>
            <div class="card-body">
                <table id="myTable" class="table-bordered">
                    <thead>
                    <tr>
                        <th class="w-100">Name</th>
                        <th>Completed</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user_data as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td class="text-right">{{ $data->completed }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
