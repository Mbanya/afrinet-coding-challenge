@extends('layouts.main')

@section('assets')
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.header')
    <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-warning">
                            @if(session()->has('success'))
                                <div class="alert alert-success alert-outline-coloured alert-dismissible"
                                     role="alert">
                                    <button type="button" class="close float-none" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>

                                    <div class="alert-message">

                                        <i class="far fa-smile"></i>

                                        {{session()->get('success')}}
                                    </div>
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Edit Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('employees.update',$employee)}}" method="POST" >
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name" value="{{old('first_name',$employee->first_name)}}">
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" value="{{old('last_name',$employee->last_name)}}">
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter Email Address" value="{{old('email',$employee->email)}}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone Number" value="{{old('phone',$employee->phone)}}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Select Company</label>
                                        <select class="form-control @error('company') is-invalid @enderror" name="company" id="company">
                                            <option selected disabled>Select Employee's Company</option>
                                            @forelse($companies as $item)
                                                <option value="{{$item->id}}"  {{ ($item->id === $employee->company_id ) ? 'selected="selected"' : '' }}>
                                                    {{$item->name}}
                                                </option>
                                            @empty
                                                <option>No Companies Available</option>
                                            @endforelse
                                        </select>
                                        @error('company')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Edit {{$employee->full_name}}</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->





                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row (main row) -->
        </section>

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('partials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
@endsection
@section('scripts')
@endsection
