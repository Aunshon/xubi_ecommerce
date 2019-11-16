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
Manage Products
@endsection
@section('desh_content')









<div class="col-12">




        <div>
                <table class="table">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">UserName / Email</th>
                    <th scope="col">Product name/Brand</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Activation</th>
                    <th scope="col">Point</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allproduct as $item)
                    <tr>
                    <th scope="row">
                        <p>{{App\User::findOrFail($item->user_id)->name}}</p>
                        <p>{{App\User::findOrFail($item->user_id)->email}}</p>
                    </th>
                    <th scope="row">
                        <p>{{$item->product_name}}</p>
                        <p>{{$item->product_name}}</p>
                    </th>
                    <th scope="row">{{App\category::findOrFail($item->category)->category_name}}</th>
                    <th scope="row">{{$item->product_price}}</th>
                    <td><textarea name="adiinfo" cols="20" rows="2" readonly> {{$item->description}} </textarea></td>
                    <td>
                            @if ($item->activation == 1)
                                <a class="btn btn-success" href=" {{__('changeProductActivation')}}/{{$item->id}}/{{$item->activation}} ">Active</a>
                            @else
                                <a class="btn btn-danger" href=" {{__('changeProductActivation')}}/{{$item->id}}/{{$item->activation}} ">Inactive</a>
                            @endif
                        </td>
                    <th scope="row">{{$item->point}}</th>
                    <td>
                        <img src=" {{asset('uploads/product')}}/{{$item->photo}} " width="50px" alt="Photo Link Not Found">
                    </td>
                    <td>
                        <a class="btn btn-primary" href=" {{__('editProduct')}}/{{$item->id}} "><i class="fa fa-edit"></i></a>
                        {{-- <a class="btn btn-danger" href=" {{__("deleteCategory")}}/{{$item->id}} " ><i class="fa fa-trash"></i></a> --}}
                        <button onclick="myFunction({{$item->id}})" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                    </td>
                    </tr>
                    @empty
                    <tr><td>
                        <div class="row">
                            <div class="alert alert-danger" role="alert">
                                No Data Available
                            </div>
                        </div>
                    </td></tr>
                    @endforelse
                </tbody>
                </table>
                {{-- {{ $allproduct->links() }} --}}
        </div>



        </div>








     @section('addNewScript')
        {{-- <script src="{{ asset('assets/js/addCategory.js') }}"></script> --}}
        <script>
            function myFunction(id) {
            var txt;
            var r = confirm("Make sure you want to delete ?!");
                if (r == true) {
                    location.href = "{{__("deleteproduct")}}/"+id;
                    // alert("{{__("deletecategory")}}/"+id);
                }
            }
        </script>

    @endsection






@endsection
