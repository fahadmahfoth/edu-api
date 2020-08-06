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
            Curricula
        </h1>

        <div style="padding: 20px">
            <a href="/curricula/create" class="btn btn-success">Add + </a></div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">المرحلة</th>
                    <th scope="col">الملف</th>

                </tr>
            </thead>
            <tbody>

                <tr>
                    @foreach ($curricula as $item)

                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->stage }}</td>
                        <td>{{ $item->file }}</td>

                        <td>

                            <a href="/curricula/{{ $item->id }}/edit" class="btn btn-primary">Edit</a>
                            {!! Form::open(['action' => ['Admin\CurriculaAdminController@destroy', $item->id], 'method' =>
                            'POST']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                            {!! Form::close() !!}
                        </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>


    <div class="container">
        {{ $curricula->links() }}
    </div>


@endsection
