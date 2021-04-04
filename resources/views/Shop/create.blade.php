@extends('partials.master')

@section('content')
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

 <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Shop</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">create</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                @if(Session::has('error'))
                <div class="alert alert-danger" style="wid">
                    {{ json_decode(json_encode(Session::get('error')))->original->message}}
                 </div>

                 @endif
                 @if(Session::has('success'))
                 <div class="alert alert-success" style="wid">
                     {{ json_decode(json_encode(Session::get('success')))->original->message}}
                  </div>
 
                  @endif
                <div class="row justify-content-center">
                    {{-- // Name (required), email, logo (minimum 100×100), website --}}
                 
                    <!-- Column -->
                  
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                
                                <form class="form-horizontal form-material mx-2" enctype="multipart/form-data" method="POST" action="{{route('shop.store')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Shop Name</label>
                                        <div class="col-md-12">
                                            <input name="name" type="text" placeholder="souq"
                                                class="form-control ps-0 form-control-line">
                                                @if($errors->has('name'))
                                                <div class="alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input name="email" type="text" placeholder="test@admin.com"
                                                class="form-control ps-0 form-control-line" name="example-email"
                                                id="example-email">
                                                @if($errors->has('email'))
                                                <div class="alert-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Website</label>
                                        <div class="col-md-12">
                                            <input name="website" type="text" placeholder="https://www.shop.com"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Logo</label>
                                        <div class="col-md-12">
                                            <input name="logo" type="file" placeholder="img.png"
                                                class="form-control ps-0 form-control-line">
                                                @if($errors->has('logo'))
                                                <div class="alert-danger">{{ $errors->first('logo') }}</div>
                                            @endif
                                            </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <input type="submit" name="submit" value="create" class="btn btn-success mx-auto mx-md-0 text-white"/>
                                                
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
          
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
@endsection
