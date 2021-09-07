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
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Company</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->


                            <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @if (isset($errors) && count($errors))
                                    <div class="alert alert-danger alert-outline-coloured alert-dismissible"
                                         role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <div class="alert-icon">
                                            <i class="far fa-fw fa-bell"></i>
                                        </div>
                                        <div class="alert-message">
                                            There were {{count($errors->all())}} Error(s)
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }} </li>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
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
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Company Name</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Company Name" value="{{old('name')}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Company Email</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"  placeholder="Enter Company Email" value="{{old('email')}}">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="website">Company Website</label>
                                        <input type="text" id="website" name="website" class="form-control @error('website') is-invalid @enderror"  placeholder="Enter Company Website" value="{{old('website')}}">
                                        @error('website')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputFile">Company Logo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"  name="logo" class="custom-file-input @error('logo') is-invalid @enderror" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create Company</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->





                        </div>
                        <!-- /.card -->

                    </div>
                </div>
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
