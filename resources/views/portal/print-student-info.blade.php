@extends('layouts.user')
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4>Invoice</h4>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <h5> <i class="fas fa-info"> </i> Note: Click the print button at the bottom of the invoice to test.</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <div class="card card-chart">
                <div class="card-body">
                    <div class="container">
                        <!-- title row -->
            <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> E.G: Course Author
                    <small class="float-right">Date: {{date('d-M-Y')}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col" style="color:white">
                  From
                  <address>
                    <strong>Course Title: {{$exam->title}}</strong><br>
                    Category: {{$exam->category}}<br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="color:white">
                  To
                  <address>
                   <strong>{{$student->name}}</strong><br>
                    Phone: {{$student->mobile_no}}<br>
                    Email: {{$student->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="color:white">
                  <b>Course Enrollment Slip </b><br>
                  <br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
  
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Course Name</th>
                      <th>Category</th>
                      <th>Purchased By </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>{{$exam->title}}</td>
                      <td>{{$exam->category}}</td>
                      <td>{{$student->name}}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
  
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button  class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                  {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> --}}
                </div>
              </div>
                    </div>
                </div>
            </div>
            
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection