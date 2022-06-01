@include('layouts.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <a class="btn btn-primary btn-sm">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>NIC</th>
                    <th>Special Access</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $userdata)
                        <tr>
                            <td>{{ $userdata->id }}</td>
                            <td>{{ $userdata->name }}</td>
                            <td>{{ $userdata->mobile }}</td>
                            <td>{{ $userdata->nic }}</td>
                            <td class="text-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="{{$userdata->nic}}">
                                <label class="custom-control-label" for="{{$userdata->nic}}"></label>
                            </div>
                            </td>
                            <td class="text-center">
                              <span class="badge badge-success">
                                Active
                              </span>
                            </td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-outline-danger mr-2">
                                    <i class="fa fa-ban" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-outline-success btn-sm">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>NIC</th>
                    <th>Special Access</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('layouts.footer')
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
</body>
</html>
