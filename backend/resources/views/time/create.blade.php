@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить время</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="col-12">
                <form action="{{route('time.store')}}" method="POST" class="w-25">
                    @csrf
                    <div class="form-group">
                        <label>Start</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input name="start" type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>End</label>
                        <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                            <input name="end" type="text" class="form-control datetimepicker-input" data-target="#reservationdate2">
                            <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('time.index')}}" class="btn btn-secondary">Назад</a>
                    <input type="submit" class="btn btn-primary" value="Добавить">
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
