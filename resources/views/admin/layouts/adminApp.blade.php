<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.layouts.components.meta')

    <!-- Title Page-->
    <title>Admin | Login</title>

    @include('admin.layouts.components.css')

</head>

<body class="animsition">


@php
// dump(session()->all());
// dump(url()->previous());
// dump(Request::route()->getName());
@endphp


    <div class="page-wrapper">
      
        @include('admin.layouts.components.headerMobile')
      
  
        @include('admin.layouts.components.sidebar')
  
        <!-- PAGE CONTAINER-->
        <div class="page-container">

            @include('admin.layouts.components.topHeaderDesktop')

            @yield('breadcrumb')
            
            <!-- MAIN CONTENT-->
            <div class="main-content">
            <div class="section__content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->
  
    </div>
  
    @include('admin.layouts.components.js')
  
  </body>

</html>
<!-- end document-->