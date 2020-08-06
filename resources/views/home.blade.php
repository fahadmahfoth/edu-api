@extends('layouts.app')

@section('content')

    <section class="content">

        <div style="" class="container">


            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $schools_count }}</h3>

                            <p style="text-align: center">Schools</p>
                        </div>

                        <a href="/schools" class="small-box-footer">show <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $departments_count }}</h3>

                            <p style="text-align: center">Departments</p>
                        </div>

                        <a href="/departments" class="small-box-footer">show <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $curricula_count }}</h3>

                            <p style="text-align: center">Curricula</p>
                        </div>

                        <a href="/curricula" class="small-box-footer">show <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $suggests_count }}</h3>

                            <p style="text-align: center">Suggests</p>
                        </div>

                        <a href="/suggests" class="small-box-footer">show <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->


                @if (Auth::guest())

                @else

                    @foreach (auth()
            ->user()
            ->getRoleNames()
        as $item)
                        @if ($item == 'super-admin')


                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{ $users_count }}</h3>

                                        <p style="text-align: center">Users</p>
                                    </div>

                                    <a href="/users" class="small-box-footer">show <i
                                            class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>


                        @endif

                    @endforeach


                @endif

                <!-- ./col -->
            </div>

        </div>
    </section>

@endsection
