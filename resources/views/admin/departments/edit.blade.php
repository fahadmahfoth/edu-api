@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>
            Edit {{ $department->name }} Department
        </h1>

        {!! Form::open(['action' => ['Admin\DepartmentsAdminController@update', $department->id], 'method' => 'POST',
        'enctype' => 'multipart/form-data']) !!}
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
            <input value="{{ $department->name }}" class="form-control" name="name">
        </div>


        <div class="form-group">
            <label>Image</label>
            <input type="file" class="form-control-file" name="image">
        </div>

        <div class="form-group">
            <label>College File</label>
            <input type="file" class="form-control-file" name="colleges">
        </div>

        <div class="form-group">
            <label>Info File</label>
            <input type="file" class="form-control-file" name="info_file">
        </div>

        <div class="form-group">
            <label>select curricula</label>
            <select style="height: 200px" name="curricula[]" multiple class="form-control ">
                @foreach ($curricula as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach


            </select>
        </div>


        <div class="form-group">
            <label for="comment">Description</label>
            <textarea name="description" class="form-control" rows="5" id="comment">
            {{ $department->description }}
            </textarea>
        </div>






        <button type="submit" name="submit" class="btn btn-primary">Save Update</button>
        {!! Form::close() !!}




        </script>

    @endsection
