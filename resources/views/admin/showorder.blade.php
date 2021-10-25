
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
             
                <table>
                    <tr style="background-color: gray">
                        <td style="padding: 40px">Customer</td>
                        <td style="padding: 40px">Phone</td>
                        <td style="padding: 40px">Address</td>
                        <td style="padding: 40px">Product</td>
                        <td style="padding: 40px">Price</td>
                        <td style="padding: 40px">Quantity</td>
                        <td style="padding: 40px">Status</td>
                        <td style="padding: 40px">Approved</td>
                    </tr>

                    @foreach ($order as $orders)
                    <tr align="center" style="background-color: black">
                        <td style="padding: 40px">{{ $orders->name }}</td>
                        <td style="padding: 40px">{{ $orders->phone }}</td>
                        <td style="padding: 40px">{{ $orders->address }}</td>
                        <td style="padding: 40px">{{ $orders->product_name }}</td>
                        <td style="padding: 40px">{{ $orders->quantity }}</td>
                        <td style="padding: 40px">{{ $orders->price }}</td>
                        <td style="padding: 40px">{{ $orders->status }}</td>
                        <td style="padding: 40px"><a href="{{ url('updatestatus',$orders->id) }}" class="btn btn-success"> Delivered </a></td>
                    </tr>    
                    @endforeach
                    
                </table>

            </div>
        </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>