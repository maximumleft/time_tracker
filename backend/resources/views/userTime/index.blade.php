@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Время пользователей</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card-body table-responsive p-0">
                <a href="{{route('time.user.create')}}" class="btn btn-outline-primary">Создать</a>
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($timeUsers as $timeUser)
                            <tr>
                                <td><a href="{{route('time.user.show',$timeUser)}}">{{$timeUser->id}}</a></td>
                                <td><a href="{{route('user.show',$timeUser)}}">{{$timeUser->UserEmail}}</a></td>
                                <td><a href="{{route('time.show',$timeUser)}}">{{$timeUser->TimeStart}}</a></td>
                                <td><a href="{{route('time.show',$timeUser)}}">{{$timeUser->TimeEnd}}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
