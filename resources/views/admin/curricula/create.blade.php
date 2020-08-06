@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>
            Add Department Page
        </h1>

        <form action="/curricula" method="POST" enctype="multipart/form-data">
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
                <label>Stage</label>
                <select  name="stage"  class="form-control ">
                    
                        <option value="first">المرحلة الاولى</option>
                        <option value="second">المرحلة الثانية</option>
                        <option value="third">المرحلة الثالثة</option>
                   


                </select>
            </div>


            <div class="form-group">
                <label>Curricula File</label>
                <input type="file" class="form-control-file" name="file">
            </div>





            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>





        </script>

    @endsection
