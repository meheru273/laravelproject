@extends('layouts.base')
@section('content')

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
                                <td>
                                    {{$cart->quantity}}
                                </td>
                                <td>
                                    <a href="{{route('remove_cart',$cart->id)}}" 
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

                <div class="cart-checkout-section">
                        <div class="col-lg-4 col-sm-4">
                            <div class="cart-box">
                                <div class="cart-box-details">
                                    <div class="total-details">
                                        <div class="top-details">
                                            <h3>Cart Totals</h3>
                                            <h6>Total Price :<span> {{$totalprice}}$</span> </h6>
                                        </div>
                                        <div class="bottom-details">
                                            <a href="checkout">Process Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-8" style="padding: 30px;">
                            <div class="checkout-button">
                                <a href="{{route('cash_order')}}" class="btn btn-solid-default btn fw-bold" >
                                    Cash On DElivery <i class="fas fa-arrow-right ms-1"></i></a>
                                    <span><span> </span></span>
                                <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                    Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>


</html>
@endsection