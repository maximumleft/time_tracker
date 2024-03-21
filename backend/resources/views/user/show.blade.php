@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
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
                    <table class="table table-hover text-nowrap w-25">
                        <tr>
                            <td>ID</td>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    </table>
                    <div class="d-flex p-3">
                        <div class="mr-3">
                            <a href="{{route('user.index')}}" class="btn btn-secondary">Назад</a>
                        </div>
                        <div class="mr-3">
                            <a href="{{route('user.edit',$user)}}" class="btn btn-outline-primary">Редактировать</a>
                        </div>

                        <form action="{{route('user.destroy',$user)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-outline-danger" value="Удалить">
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
