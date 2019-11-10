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









        <div class="col-10">



                <!--Trigger-->
                <a class="btn btn-primary" href="#" data-target="#login" data-toggle="modal"><i class="fa fa-plus"></i> New Category</a>

                <div id="login" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-body">
                        <button data-dismiss="modal" class="close">&times;</button>
                        <h4>Add new category</h4>
                      <form action="{{ Route('saveNewProduct') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Product Name</label>
                            <input name="product_name" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input name="product_price" type="number" class="form-control"  aria-describedby="emailHelp" placeholder="Enter product price">
                        </div>
                        <div class="form-group">
                            <label>Select category</label>
                            <select name="category" class="form-control" id="exampleFormControlSelect1">
                                @forelse ($allcategory as $item)
                                @if ($item->activation != 0)
                                <option value=" {{$item->id}} "> {{$item->category_name}} </option>
                                @endif
                                @empty
                                <option>No Data</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Activation</label>
                            <select name="activation" class="form-control" id="exampleFormControlSelect1">
                                <option value="1"> Active </option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control" placeholder="Write discription"></textarea>
                        </div>
                        <div class="form-group">
                            <label>product Point</label>
                            <input name="point" type="number" class="form-control"  aria-describedby="emailHelp" placeholder="Product Point">
                        </div>
                        <button type="submit" class="btn btn-primary col-12 text-center">Add</button>
                    </form>
                      </div>
                    </div>
                  </div>
                </div>



                <div>
                        <table class="table">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">Product name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Activation</th>
                            <th scope="col">Point</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allproduct as $item)
                            <tr>
                            <th scope="row">{{$item->product_name}}</th>
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
                                <a class="btn btn-primary" href=" {{__('editProduct')}}/{{$item->id}} "><i class="fa fa-edit"></i></a>
                                {{-- <a class="btn btn-danger" href=" {{__("deleteCategory")}}/{{$item->id}} " ><i class="fa fa-trash"></i></a> --}}
                                <button onclick="myFunction({{$item->id}})" class="btn btn-danger" ><i class="fa fa-trash"></i></button>
                            </td>
                            </tr>
                            @empty
                            <tr><td>No data available</td></tr>
                            @endforelse
                        </tbody>
                        </table>
                </div>



                </div>









        @section('addNewScript')



        @endsection






@endsection
