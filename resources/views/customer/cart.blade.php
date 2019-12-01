@extends('layouts.app')
<style>
    @import url(https://fonts.googleapis.com/css?family=Raleway);

*, *:before, *:after{
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing:border-box;
  box-sizing: border-box;
}

body{
  background: #f9f9f9;
  font-size: 16px;
  font-family: 'Raleway', sans-serif;
}

.main-title{
  color: #2d2d2d;
  text-align: center;
  text-transform: capitalize;
  padding: 0.7em 0;
}

.container{
  padding: 1em 0;
  float: left;
  width: 50%;
}
@media screen and (max-width: 640px){
  .container{
    display: block;
    width: 100%;
  }
}

@media screen and (min-width: 900px){
  .container{
    width: 33.33333%;
  }
}

.container .title{
  color: #1a1a1a;
  text-align: center;
  margin-bottom: 10px;
}

.content {
  position: relative;
  width: 90%;
  max-width: 400px;
  margin: auto;
  overflow: hidden;
}

.content .content-overlay {
  background: rgba(0,0,0,0.7);
  position: absolute;
  height: 99%;
  width: 100%;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out 0s;
  -moz-transition: all 0.4s ease-in-out 0s;
  transition: all 0.4s ease-in-out 0s;
}

.content:hover .content-overlay{
  opacity: 1;
}

.content-image{
  width: 100%;
}

.content-details {
  position: absolute;
  text-align: center;
  padding-left: 1em;
  padding-right: 1em;
  width: 100%;
  top: 50%;
  left: 50%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}

.content:hover .content-details{
  top: 50%;
  left: 50%;
  opacity: 1;
}

.content-details h3{
  color: #fff;
  font-weight: 500;
  letter-spacing: 0.15em;
  margin-bottom: 0.5em;
  text-transform: uppercase;
}

.content-details p{
  color: #fff;
  font-size: 0.8em;
}

.fadeIn-bottom{
  top: 80%;
}

.fadeIn-top{
  top: 20%;
}

.fadeIn-left{
  left: 20%;
}

.fadeIn-right{
  left: 80%;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cart Page


                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @php
                    $totalPrice =0;
                @endphp




                <div class="container">


                            <table class="table table-bordered table-dark">
                        <thead>
                          <tr>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Quantiry</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{Route('updateCart')}}" method="post">
                            @csrf
                        @forelse ($all_my_carts as $item)
                        <tr>
                            <th scope="row">{{App\product::findOrFail($item->product_id)->product_name}}</th>
                            <td>{{App\product::findOrFail($item->product_id)->product_price}}</td>
                            @php
                                $totalPrice += (App\product::findOrFail($item->product_id)->product_price)*($item->product_quantity);
                            @endphp
                            <td><img src="{{asset('uploads/product')}}/{{App\product::findOrFail($item->product_id)->photo}}" alt="no photo" width="50px"></td>
                            <input type="hidden" class="productId" name="productId[]" value="{{$item->product_id}}">
                            <td><input type="number" class="cartQuantity" name="cartQuantity[]" value="{{$item->product_quantity}}"></td>
                            <td>{{(App\product::findOrFail($item->product_id)->product_price)*($item->product_quantity)}}</td>
                        </tr>
                        @empty
                        No data
                        @endforelse
                    </tbody>
                </table>
                                <tr>
                                    <button id="updateBtn" type="submit" class="form-control btn btn-success">Update Cart</button>
                                </tr>
                            </form>
                </div>

                <div class="input-group">
                        <h3 type="text" class="form-control text-center">Total Amount : </h3>
                        <h3 type="text" class="form-control text-center">{{$totalPrice}}</h3>
                </div><br>









                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('addNewScript')
    <script>
        $(document).ready(function () {


            function updateValidation(e) {
                if (e.target.value <=0) {
                    // alert("quantity must be minimum 1");
                    // e.target.value = 1;
                    e.target.style.border = "2px solid red";
                    document.getElementById("updateBtn").disabled = true;
                }
                else{
                    e.target.style.border = "none";
                    document.getElementById("updateBtn").disabled = false;
                }
            }


            $('.cartQuantity').keyup(function (e) {
                updateValidation(e);
            });

            $('.cartQuantity').change(function (e) {
                updateValidation(e);
            });
        });
    </script>
@endsection
