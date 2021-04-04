@extends('partials.master')

@section('content')
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
{{-- // Name (required), email, logo (minimum 100×100), website --}}

 <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">customer</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">edit</li>
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
                <div class="row">

                    <!-- Column -->
                  
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                
                                <form class="form-horizontal form-material mx-2" enctype="multipart/form-data" method="POST" action="{{route('customer/edit')}}">
                                    @csrf
                                    <input type="hidden" name="customerId" value="{{$customer->id}}">
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">first Name</label>
                                        <div class="col-md-12">
                                            <input name="first_name" type="text" value="{{$customer->first_name}}" placeholder="souq"
                                                class="form-control ps-0 form-control-line">
                                                @if($errors->has('first_name'))
                                                <div class="alert-danger">{{ $errors->first('first_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Last Name</label>
                                        <div class="col-md-12">
                                            <input name="last_name" type="text" value="{{$customer->last_name}}" placeholder="souq"
                                                class="form-control ps-0 form-control-line">
                                                @if($errors->has('last_name'))
                                                <div class="alert-danger">{{ $errors->first('last_name') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input name="email"  value="{{$customer->email}}" type="text" placeholder="test@admin.com"
                                                class="form-control ps-0 form-control-line" name="example-email"
                                                id="example-email">
                                                @if($errors->has('email'))
                                                <div class="alert-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label class="col-md-12 mb-0">Phone</label>
                                        <div class="col-md-12">
                                            <input  value="{{$customer->phone}}" name="phone" type="text" placeholder="003423423"
                                                class="form-control ps-0 form-control-line">
                                        </div>
                                    </div>
                                    <select name="shop_id" class="form-select shadow-none border-0 ps-0 form-control-line">
                                        @foreach ($shops as $shop)
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                                            
                                        @endforeach
                                    </select>
                                    <div class="form-group">
                                        <div class="col-sm-12 d-flex">
                                            <input type="submit" name="submit" value="Update" class="btn btn-success mx-auto mx-md-0 text-white"/>
                                                
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
 
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
@endsection
