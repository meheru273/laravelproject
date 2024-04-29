@extends('layouts.base')
@section('content')
@include('sweetalert::alert')
<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Wishlist</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">image</th>
                                <th scope="col">product Slug</th>
                                <th scope="col">price</th>
                                <th scope="col">quantity</th>
                                <th scope="col">action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $totalprice=0;
                         ?>

                        @foreach($cart as $cart)
                            <tr>
                                <td>
                                <img src="assets/images/fashion/product/front/{{$cart->image}}" style=" width: 100px;">
                                </td>
                                <td>
                                  <h4>  {{$cart->slug}}  </h4>     
                                </td>
                                <td>
                                    <h2>{{$cart->price}}</h2>
                                </td>
                                <form action="{{route('add_to_cart',$cart->id)}}" method="POST">
                                    
                                    @csrf
                                <td>
                                <input type="number" name="quantity" value="{{$cart->quantity}}"
                                    min="1" style="width: 100px; height:40px; margin-bottom: 20px;">
                                </td>
                                <td>
                                <button type="submit" class="btn btn-solid-default"
                                        action="">
                                        Add To Cart</button>
                                </td>
                                </form>
                                <td>
                                    <a href="{{route('remove_wishlist',$cart->id)}}" 
                                    onclick="return confirm('Are you Sure?')"
                                    class="btn btn-solid-default" style="color: white;">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            <?php 
                        $totalprice=$totalprice+$cart->price
                         ?>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="row d-flex justify-content-center">
                        @if(Session::has('message'))
                        <div class="col-md-10 mt-4">
                            <div class="alert alert-success">
                           {{Session::get('message')}} 
                            </div>
                        </div>
                        @endif
                </div>
                <div class="col-12 mt-md-5 mt-4">
                    <div class="row">
                        <div class="col-sm-5 col-7">
                            <div class="left-side-button float-start">
                                <a href="{{route('shop.index')}}" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                    <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </section>


</html>
@endsection