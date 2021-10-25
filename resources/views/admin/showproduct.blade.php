
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
        <div style="padding-bottom: 30px" class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                
                @if (session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                
                <table>
                    <tr style="background-color: grey">
                        <td style="padding: 60px;">Title</td>
                        <td style="padding: 60px;">Description</td>
                        <td style="padding: 60px;">Quantity</td>
                        <td style="padding: 60px;">Price</td>
                        <td style="padding: 60px;">Image</td>
                        <td style="padding: 60px;">Update</td>
                        <td style="padding: 60px;">Delete</td>
                    </tr>

                    @foreach ($data as $product)
                        
                    
                    <tr align="center" style="background-color: black; " >
                        <td >{{ $product->title }}</td>
                        <td >{{ $product->description }}</td>
                        <td >{{ $product->quantity }}</td>
                        <td >{{ $product->price }}</td>
                        <td ><img height="150" width="150" src="/productimage/{{ $product->image }}"></td>
                        <td> <a class="btn btn-primary" href="{{ url('updateproduct',$product->id) }}">Update</a></td>
                        <td> <a class="btn btn-danger" onclick="return confirm('Are You Sure ?')" href="{{ url('deleteproduct',$product->id) }}">Delete</a></td>
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