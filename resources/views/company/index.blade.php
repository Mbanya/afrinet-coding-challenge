@extends('layouts.main')

@section('assets')
@endsection


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.header')
    <!-- /.content-header -->
        @include('partials.delete-modal')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header">
                             <h3 class="card-title">List Companies</h3>
                         </div>
                         <!-- /.card-header -->
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
                             <table id="example2" class="table table-bordered table-striped">
                                 <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Company Name</th>
                                     <th>Email</th>
                                     <th>Website</th>
                                     <th>Logo</th>
                                     <th>Actions</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 @forelse($companies as $item)
                                 <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="mailto:{{$item->email}}">{{$item->email}}</a>
                                        </td>
                                    <td>
                                        <a href="{{$item->website}}" target="_blank">{{$item->website}}</a>
                                     </td>
                                     <td>
                                         <img src="{{asset('storage/company_logos/'.$item->logo)}}" alt="{{$item->name}}">
                                     </td>
                                     <td>
                                         <div class="row">
                                             <a href="{{route('companies.edit',$item)}}" class="btn btn-block btn-warning btn-sm">
                                                 <i class="fa fa-pencil-alt"></i>
                                                 Edit
                                             </a>

                                             <button type="button" class="delete-modal btn btn-block btn-danger btn-sm" data-info="{{$item->id}}, {{$item->name}}">
                                                 <i class="fa fa-trash"></i>
                                                 Delete
                                             </button>
                                         </div>


                                     </td>
                                 </tr>
                                 @empty
                                 <tr>

                                 </tr>
                                 @endforelse

                                 </tbody>
                                 <tfoot>
                                 <tr>
                                     <th>#</th>
                                     <th>Company Name</th>
                                     <th>Email</th>
                                     <th>Website</th>
                                     <th>Logo</th>
                                     <th>Actions</th>
                                 </tr>
                                 </tfoot>
                             </table>
                         </div>
                         <!-- /.card-body -->
                     </div>
                 </div>

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

    <script>
        $(function () {
   
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $(document).on('click','.delete-modal', function () {
            $('#footer_action_button').text(" Delete");
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').removeClass('edit');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Delete');
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            var stuff = $(this).data('info').split(',');
            $('#did').val(stuff[0]);
            $('.empname').html(stuff[1]);
            $('#myModal').modal('show');
        });

        $('.modal-footer').on('click','.delete', function () {
            $.ajax({
                type: 'POST',
                url: 'deleteCompany',
                data: {
                    '_token': "{{csrf_token()}}",
                    'id':$("#did").val(),
                },
                success: function (data) {
                    $('.item' + $('.did').text()).remove();
                    $('#myModal').modal('hide');
                    $('#toast2').toast('show');
                    location.reload();
                }
            })
        });
    </script>
@endsection
