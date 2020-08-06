@extends('layouts.app')

@section('content')





@if(Session::has('success'))
<div class="container">      
    <div class="alert alert-success"><em> {!! session('success') !!}</em>
    </div>
</div>
@endif

    <div class="container">
        <h1>
            Departments
        </h1>

        <div style="padding: 20px">
            <a href="/departments/create" class="btn btn-success">Add + </a></div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">الاسم</th>

                    <th scope="col">الكليات</th>
                    <th scope="col">المناهج</th>
                    <th scope="col">امر</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    @foreach ($departments as $department)

                        <th scope="row">{{ $department->id }}</th>
                        <td>{{ $department->name }}</td>

                        <td><a href="/files/{{ $department->colleges }}" download>
                                Download

                            </a></td>


                        <td>
                            @foreach ($department->curricula as $item)

                                {{ $item->name }}
                                <br>

                            @endforeach
                        </td>

                        </td>
                        <td>
                            <div class="row">

                                <a href="/departments/{{ $department->id }}" class="btn btn-warning">Show</a>

                                <a href="/departments/{{ $department->id }}/edit" class="btn btn-primary">Edit</a>
                                {!! Form::open(['action' => ['Admin\DepartmentsAdminController@destroy', $department->id],
                                'method' => 'POST']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {!! Form::close() !!}


                            </div>

                        </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>


    <div class="container">
        {{ $departments->links() }}
    </div>


@endsection
