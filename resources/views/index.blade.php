@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success">
                <b class="text-center">{{ Session::get('success') }}</b>
            </div>
        @endif
        <div class="row centered-form">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Simple Student Registration </h3>
                    </div>
                    <div class="panel-body">
                        <form action="{!! url('student/store') !!}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('name') ? ' is-invalid' : '' }}">
                                        <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name">
                                        @if ($errors->has('name'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group {{ $errors->has('student_id') ? ' is-invalid' : '' }}">
                                        <input type="text" name="student_id" id="student_id" class="form-control input-sm" placeholder="Student Id">
                                        @if ($errors->has('student_id'))
                                            <span>
                                                <strong class="text-danger">{{ $errors->first('student_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                                @if ($errors->has('email'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('password') ? ' is-invalid' : '' }}">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span>
                                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
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



            <div class="col-md-8">
                <h3 class="panel-title">All Student Records</h3>
                <table class="table table-striped custab table-hover table-bordered">
                    <thead>
                    @php $i = 1 @endphp
                    <tr>
                        <th>#</th>
                        <th>S.ID</th>
                        <th>S.Name</th>
                        <th>S.Email</th>
                        <th>S.Avatar</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    @foreach($students as $student)
                    <tr>
                        <td>{!! $i++ !!}</td>
                        <td>{!! $student->student_id !!}</td>
                        <td>{!! $student->name !!}</td>
                        <td>{!! $student->email !!}</td>
                        <td><img src="{!! asset('avatar/'.$student->avatar) !!}" alt="{!! $student->name !!}" width="80"></td>
                        <td class="text-center">
                            <a class='btn btn-info btn-xs' href="{!! url('student/edit', $student->id) !!}"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                            <a href="{!! url('student/delete', $student->id) !!}" onclick="return(confirm('Are you sure wants to delete...'))" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
                        </td>
                    </tr>
                    @endforeach

                </table>
            </div>

        </div>
    </div>
@endsection
