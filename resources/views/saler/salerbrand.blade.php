@extends('layouts.desh_app')
@section('searchpanel')
<li class="hide-phone app-search">
    <form role="search" class="">
        <input type="text" placeholder="Search..." class="form-control">
        <a href=""><i class="fa fa-search"></i></a>
    </form>
</li>
@endsection
@section('pageHeading')
Manage Brands
@endsection
@section('desh_content')
<meta name="csrf-token" content="{{ csrf_token() }}">










<div class="col-10">



        <!--Trigger-->
        <a class="btn btn-primary" href="#" data-target="#login" data-toggle="modal"><i class="fa fa-plus"></i> New Brand</a>

        <div id="login" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4>Add new Brand To Your List</h4>
                <input id="searchBrand" type="text" class="form-control" placeholder="Search Brand">
                <form action="{{Route('addNewBrand')}}" method="POST">
                    @csrf
                  <div class="m-b-0">
                    <select name="brand" id="sres" class="form-control" multiple="" data-role="tagsinput">

                    </select>
                </div>
                <button class="btn btn-success form-control">Add to list</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <a class="btn btn-primary" href="#" data-target="#req" data-toggle="modal"><i class="fa fa-plus"></i>Request Brad</a>

        <div id="req" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <div class="modal-content">
              <div class="modal-body">
                <button data-dismiss="modal" class="close">&times;</button>
                <h4>Request a new brand</h4>
                <form enctype="multipart/form-data" action="{{ Route('saveNewBrand') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input name="brand_name" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Brand name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Photo</label>
                        <input name="photo" type="file" accept="image/*" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Activation</label>
                        <select name="activation" class="form-control" id="exampleFormControlSelect1">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary col-12 text-center">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
            <div class="col">

            </div>
            <div class="col">
              {{-- <input id="show" type="text" class="form-control" placeholder="Last name"> --}}
            </div>
        </div>


        </div>






        @section('addNewScript')
            {{-- <script src="{{ asset('assets/js/addCategory.js') }}"></script> --}}
            <script>
                $(document).ready(function name() {



                $('#searchBrand').keyup(function() {
                var searchData = $('#searchBrand').val();
                    // $('#show').val(searchData);

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                // alert(searchData.toLowerCase());

                $.ajax({
                type:'POST',
                url:'/getBrandSearch',
                data: {searchData: searchData},
                    success: function (data) {
                        // $( "#company_upazilla" ).html(data);
                        // $('#productid').html(data);
                        $('#sres').html(data);
                        // alert(data);
                    }
                });






                });




                });
            </script>

        @endsection






@endsection
