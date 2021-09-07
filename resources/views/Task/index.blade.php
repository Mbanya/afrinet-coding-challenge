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

                @livewire('add-task')
                <h4 class="mt-5">My To-Dos</h4>
                @livewire('task-list')

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
