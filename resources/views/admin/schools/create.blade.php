@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>
            Add School Page
        </h1>

        <form action="/schools" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
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
                <input class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Facebook</label>
                <input class="form-control" name="facebook">
            </div>
            <div class="form-group">
                <label>Location LAT</label>
                <input class="form-control" name="location_lat">
            </div>
            <div class="form-group">
                <label>Location LNG</label>
                <input class="form-control" name="location_lng">
            </div>
            <div class="form-group">
                <label for="comment">Description</label>
                <textarea name="description" class="form-control" rows="5" id="comment"></textarea>
            </div>


            <div class="form-group">
                <label>Departments</label>
                <select style="height: 200px" multiple class="form-control" name="departments[]">
                    @foreach ($departments as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>



            <div class="form-group">
                <label>Image</label>
                <input type="file" class="form-control-file" name="image">
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>


    @endsection
