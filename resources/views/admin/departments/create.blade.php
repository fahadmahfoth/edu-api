@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>
            Add Department Page
        </h1>

        <form action="/departments" method="POST" enctype="multipart/form-data">
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
                <label>Image</label>
                <input type="file" class="form-control-file"  value="image" name="image">
            </div>

            <div class="form-group">
                <label>College File</label>
                <input type="file" class="form-control-file"  value="colleges" name="colleges">
            </div>
            <div class="form-group">
                <label>Info File</label>
                <input type="file" class="form-control-file" value="info_file" name="info_file">
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
                <textarea name="description" class="form-control" rows="5" id="comment"></textarea>
            </div>






            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>




        </script>

    @endsection
