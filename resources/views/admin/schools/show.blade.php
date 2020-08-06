@extends('layouts.app')

@section('content')

    <div style="text-align: center" class="container">
        <h1>
            {{ $school->name }}
        </h1>


        <div class="jumbotron">
            <img src="/images/{{ $school->image }}" alt="image">
            <p class="lead"> Location LAT {{ $school->location_lat }} | Location LNG {{ $school->location_lng }}</p>
            <hr class="my-4">
            <br>

            <h2> Description</h2>
            <p> {{ $school->description }}</p>




            <h3>Department</h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">القسم</th>

                        <th scope="col">المعلومات</th>
                        <th scope="col">الكليات</th>


                    </tr>
                </thead>
                <tbody>

                    <tr>





                        @foreach ($school->department as $item)

                            <th scope="row">{{ $item->id }}</th>
                            <td>
                                {{ $item->name }}

                            </td>

                            <td>
                                {{ $item->colleges }}

                            </td>




                        @endforeach




                    </tr>



                </tbody>
            </table>


        </div>


    @endsection
