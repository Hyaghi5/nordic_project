    @extends('layouts.admin_layout')

    @section('content')
    <div id="content-wrapper">
      



      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active" style="text-transform: capitalize;">{{Request::segment(2)}}</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            {{Request::segment(2)}}</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Facebook Link</th>
                    <th>twitter Link</th>
                    <th>youtube Link</th>
                    <th>phone</th>
                    <th>Instagram Link</th>
                     <th>Operations</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$contact->id }}</td>
                    <td>{{$contact->address }}</td>
                    <td>{{$contact->email }}</td>
                    <td>{{$contact->facebook }}</td>
                    <td>{{$contact->twitter }}</td>
                    <td>{{$contact->youtube }}</td>
                    <td>{{$contact->phone }}</td>
                    <td>{{$contact->instagram }}</td>

                    <td style="width: 17%;"><div class="container">
                      <div  class="row"><a style="margin-left:1%" href="/admin/contact/update/{{$contact->id}}"><button class="btn btn-primary" aria-hidden="true">Edit</button></a>
                      </div>
                    <div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>



      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->
    @endsection