@extends('layouts.app')

@section('content')

    <div style="text-align: center" class="container">
        <h1>
            {{ $department->name }}
        </h1>


        <div class="">
            <img src="/images/{{ $department->image }}" alt="image">

            <h2> Description </h2>
            <p> {{ $department->description }}</p>









            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">الاسم</th>
                        <th scope="col">معلومات القسم</th>
                        <th scope="col">الكليات</th>


                    </tr>
                </thead>
                <tbody>

                    <tr>


                        <th scope="row">{{ $department->id }}</th>
                        <td>{{ $department->name }}</td>
                        <td><a href="/files/{{ $department->info_file }}" download>
                            Download

                        </a></td>
                        <td><a href="/files/{{ $department->colleges }}" download>
                                Download

                            </a></td>


                        {{-- <td>
                            @foreach ($department->curricula as $item)

                                {{ $item->name }}

                            @endforeach
                        </td> --}}



                    </tr>



                </tbody>
            </table>



            <hr class="my-4">

            <h3>Curricula</h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">المنهج</th>
                        <th scope="col">المرحلة</th>
                        <th scope="col">تحميل</th>


                    </tr>
                </thead>
                <tbody>

                    <tr>





                        @foreach ($department->curricula as $item)

                            <th scope="row">{{ $department->id }}</th>
                            <td>
                                {{ $item->name }}

                            </td>

                            <td>
                                {{ $item->stage }}

                            </td>


                            <td>
                                <a href="/files/{{ $item->file }}" download> File</a>


                            </td>


                    </tr>

                    @endforeach







                </tbody>
            </table>
            <br>










        </div>


    @endsection
