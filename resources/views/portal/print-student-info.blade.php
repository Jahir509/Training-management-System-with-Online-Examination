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
                                <h5> <i class="fas fa-info"> </i> Note: This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.</h5>
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
                    Category: {{$exam->category_name}}<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="color:white">
                  To
                  <address>
                   <strong>{{$student->name}}</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: {{$student->mobile_no}}<br>
                    Email: {{$student->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col" style="color:white">
                  <b>Invoice </b><br>
                  <br>
                  <b>Order ID:</b> <br>
                  <b>Payment Due:</b> <br>
                  <b>Account:</b> 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
  
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>Call of Duty</td>
                      <td>455-981-221</td>
                      <td>El snort testosterone trophy driving gloves handsome</td>
                      <td>$64.50</td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Grown Ups Blue Ray</td>
                      <td>422-568-642</td>
                      <td>Tousled lomo letterpress</td>
                      <td>$25.99</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
  
              <div class="row" >
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{asset('assets/img/credit/visa.png')}}" alt="Visa">
                  <img src="{{asset('assets/img/credit/mastercard.png')}}" alt="Mastercard">
                  <img src="{{asset('assets/img/credit/american-express.png')}}" alt="American Express">
                  <img src="{{asset('assets/img/credit/paypal2.png')}}" alt="Paypal">
  
                  <p class="well well-sm shadow-none" style="margin-top: 10px; color:white"">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6" >
                  <p class="lead">Amount Due 2/22/2014</p>
  
                  <div class="table-responsive">
                    <table class="table" style="color: white">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$250.30</td>
                      </tr>
                      <tr>
                        <th>Tax (9.3%)</th>
                        <td>$10.34</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>$265.24</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
  
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button  class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
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