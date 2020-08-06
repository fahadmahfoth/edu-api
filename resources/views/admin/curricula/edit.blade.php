@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>
            Add Department Page
        </h1>

        {!! Form::open(['action' => ['Admin\CurriculaAdminController@update', $curricula->id], 'method' => 'POST', 'enctype'
        => 'multipart/form-data']) !!}
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @if (session('status'))
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                    </div>
                </div>
            </div>
        @endif
        <div class="form-group">
            <label>Name</label>
            <input value="{{ $curricula->name }}" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>Stage</label>
            <input value="{{ $curricula->stage }}" class="form-control" name="stage">
        </div>



        <div class="form-group">
            <label>Curricula File</label>
            <input type="file" class="form-control-file" name="file">
        </div>




        <button type="submit" name="submit" class="btn btn-primary">Save Update</button>
        {!! Form::close() !!}


        </script>

    @endsection
