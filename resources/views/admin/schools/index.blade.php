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
            Schools
        </h1>

        <div style="padding: 20px">
            <a href="/schools/create" class="btn btn-success">Add + </a></div>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">فيسبوك</th>
                    <th scope="col">الموقع</th>
                    <th scope="col">الاقسام</th>
                    <th scope="col">امر</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    @foreach ($schools as $school)

                        <th scope="row">{{ $school->id }}</th>
                        <td>{{ $school->name }}</td>
                        <td><a href="{{ $school->facebook }}"> Facebook School</a></td>
                        <td>{{ $school->location_lat }} , {{ $school->location_lng }}</td>
                        <td>
                            @foreach ($school->department as $item)
                                <p> {{ $item->name }}</p>
                                <br>

                            @endforeach
                        </td>
                        <td>

                            <div class="row">

                                <a href="/schools/{{ $school->id }}" class="btn btn-warning">Show</a>
                                {!! Form::open(['action' => ['Admin\SchoolsAdminController@destroy', $school->id], 'method'
                                => 'POST']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {!! Form::close() !!}
                                <a href="/schools/{{ $school->id }}/edit" class="btn btn-primary">Edit</a>


                            </div>


                        </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>


    <div class="container">
        {{ $schools->links() }}
    </div>



@endsection
