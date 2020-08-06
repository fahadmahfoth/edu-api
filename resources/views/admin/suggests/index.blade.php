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
            Suggests
        </h1>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">الايميل</th>
                    <th scope="col">امر</th>

                </tr>
            </thead>
            <tbody>

                <tr>
                    @foreach ($suggests as $suggest)

                        <th scope="row">{{ $suggest->id }}</th>
                        <td>{{ $suggest->name }}</td>
                        <td>{{ $suggest->email }}</td>

                        <td>
                            <a href="/suggests/{{ $suggest->id }}" class="btn btn-warning">Show</a>
                            {!! Form::open(['action' => ['Admin\SuggestsAdminController@destroy', $suggest->id], 'method' =>
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
        {{ $suggests->links() }}
    </div>


@endsection
