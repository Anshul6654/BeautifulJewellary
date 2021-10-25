
<!DOCTYPE html>
<html lang="en">

  <head>
      <base href="/public" > 
    @include('admin.css')
    <style type="text/css">
        .title{
            color: white; 
            padding-top:50px; 
            font-size:30px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
    </style>
  </head>
  <body>
    @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
                <h1 class="title"> Update Product </h1>
                
                
                
                @if (session()->has('message'))
                <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                    
                
                <form action="{{ url('updateproductfor',$data->id) }}" method="post"  enctype="multipart/form-data">
                @csrf
                <div style="padding:15px">
                    <label>Product Name</label>
                    <input class="text-black" type="text" name="title" value="{{ $data->title }}" required="true" >
                </div>
                <div style="padding:15px">
                    <label>Price</label>
                    <input class="text-black" type="number" name="price" value="{{ $data->price }}" required="" >
                </div>
                <div style="padding:15px">
                    <label>Description</label>
                    <input class="text-black" type="text" name="desc" value="{{ $data->description }}" required="">
                </div>
                <div style="padding:15px">
                    <label>Quantity</label>
                    <input class="text-black" type="number" name="quantity" value="{{ $data->quantity }}" required="">
                </div>
                
                <div style="padding:15px">
                    <label>Old Image</label>
                    <img height="150" width="150" src="/productimage/{{ $data->image }}">
                </div>

                <div style="padding:15px">
                    <label>Change The Image</label>
                  <input type="file" name="file" >
                </div>

                <div style="padding:15px">
                    <input class="btn btn-success" type="submit">
                  </div>

                </form>

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