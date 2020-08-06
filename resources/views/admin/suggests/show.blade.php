@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 style="text-align: center">
            {{ $suggest->name }}
        </h1>


        <div style="text-align: center" class="jumbotron">
            <p class="lead"> {{ $suggest->email }}</p>
            <hr class="my-4">
            <br>
            <h2> Message </h2>

            <p dir="auto"> {{ $suggest->message }}</p>



        </div>


    @endsection
