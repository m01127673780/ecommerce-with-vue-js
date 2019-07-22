@include('admin.layouts.header')
@include('admin.layouts.navbar')


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            پیشخوان
            <small>پنل مدیریت</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
            <li class="active">پیشخوان</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">



  	@include('admin.layouts.message')
   
      @yield('content')

       </section>
      </div><!-- /.content-wrapper -->

@include('admin.layouts.footer')
