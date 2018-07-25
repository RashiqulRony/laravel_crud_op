@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <b class="text-center">{{ Session::get('success') }}</b>
            </div>
        @endif
        <div class="row centered-form">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update Student Information </h3>
                    </div>
                    <div class="panel-body">
                        <form action="{!! url('student/update', $student->id) !!}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                        <input type="text" name="name" value="{!! $student->name !!}" id="name" class="form-control input-sm" placeholder="Name">
                                        @if ($errors->has('name'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('student_id') ? ' is-invalid' : '' }}">
                                        <input type="text" name="student_id" value="{!! $student->student_id !!}" id="student_id" class="form-control input-sm" placeholder="Student Id">
                                        @if ($errors->has('student_id'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('student_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                <input type="email" name="email" value="{!! $student->email !!}" id="email" class="form-control input-sm" placeholder="Email Address">
                                @if ($errors->has('email'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group {{ $errors->has('avatar') ? ' is-invalid' : '' }}">
                                <input type="file" name="avatar" id="avatar" class="form-control input-sm" placeholder="avatar" accept="image/*">
                                @if ($errors->has('avatar'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <input type="submit" value="Register" class="btn btn-info btn-block">
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <h3 class="panel-title">Student Avatar</h3>
                <img src="{!! asset('avatar/'.$student->avatar) !!}" class="img-fluid img-thumbnail">
            </div>

        </div>
    </div>
@endsection
