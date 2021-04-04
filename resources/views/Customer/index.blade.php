@extends('partials.master')
@section('stylesheets')
<link href="{{asset('css/custom.css')}}" rel="stylesheet">

@endsection()
@section('content')
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Customer</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List Customer</li>
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
        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Customer</h4>
                        @if(Session::has('delete'))
                        <div class="alert alert-success" style="wid">
                            {{ Session::get('delete')}}
                         </div>
        
                         @endif
                         @if(Session::has('error'))
                         <div class="alert alert-danger" style="wid">
                             {{ Session::get('error')}}
                          </div>
         
                          @endif
                        <div class="table-responsive">
                            <div class="table">{{ $customers->links() }}</div>
                            {{-- First name (required), last name (required), shop (foreign key to Companies), email, phone --}}
                            <table class="table user-table no-wrap table-hover ">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">First Name</th>
                                        <th class="border-top-0">Last Name</th>

                                        <th class="border-top-0"> Email</th>
                                        <th class="border-top-0">Shop</th>
                                        <th class="border-top-0">Phone</th>
                                        <th class="border-top-0">Action</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr class="v-align-base">
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->first_name}}</td>
                                        <td>{{$customer->last_name}}</td>

                                        <td>{{$customer->email}}</td>
                                        
                                        <td>

                                            {{$customer->shop->name}}
                                              
                                        </td>
                                        <td>{{$customer->phone}}</td>

                                        <td>
                                            
                                            <a class="red"  href="{{route('customer/destroy',$customer->id)}}"><i class=" fas fa-trash"></i></a>
                                            <a  href="{{route('customer/update',$customer->id)}}"><i class=" fas fa-edit"></i></a>  </td>


                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="table">{{ $customers->links() }}</div>



                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
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