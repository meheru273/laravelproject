@extends('layouts.base')1
@push('styles')
<link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/css/demo2.css')}}">
@endpush
@section('content')
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
                    <h3>{{$product->name}}</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section> <!-- Shop Section start -->


    <section>
    <h2 style="padding: 50px;">Product Details:</h2>
    <div class="container">
        <div class="row gx-4 gy-5">
            <div class="col-lg-12 col-12">
                <div class="details-items">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="details-image-vertical black-slide rounded">
                                        <div>
                                            <img src="{{asset('assets/images/fashion/product/front')}}/{{$product->image}}" class="img-fluid blur-up lazyload" alt="{{$product->name}}">
                                        </div>
                                        @if($product->images) 
                                        @php 
                                            $images = explode(',',$product->images);
                                        @endphp  
                                        @foreach ($images as $image)
                                            <div>
                                                <img src="{{asset('assets/images/fashion/product/front')}}/{{$image}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        @endforeach 
                                        @endif                                       
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="details-image-1 ratio_asos">
                                        <div>
                                            <img src="{{asset('assets/images/fashion/product/front')}}/{{$product->image}}" class="img-fluid w-100 image_zoom_cls-0 blur-up lazyload" alt="{{$product->name}}">
                                        </div>

                                        @if($product->images) 
                                        @php 
                                            $images = explode(',',$product->images);
                                        @endphp  
                                        @foreach ($images as $image)
                                            <div>
                                                <img src="{{asset('assets/images/fashion/product/front')}}/{{$image}}" class="img-fluid w-100 image_zoom_cls-1 blur-up lazyload" alt="">
                                            </div>                                            
                                        @endforeach 
                                        @endif                                                                                  
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="cloth-details-size">
                                

                                <div class="details-image-concept">
                                    <h1>{{$product->name}}</h1>
                                </div>

                                <h3 class="price-detail">
                                    @if($product->sale_price)
                                        ${{$product->sale_price}}
                                    <del>${{$product->regular_price}}</del><span>
                                        {{ round((($product->regular_price - $product->sale_price)/$product->regular_price)*100) }}
                                        % off</span>
                                    @else
                                        <p>Regular Price:</p> {{$product->regular_price}}
                                    @endif
                                
                                </h3>

                                <h4 class="price-detail">
                                    {{$product->short_description}}
                                </h4>




                                <div class="mt-3 mt-md-4 border-product">
                                    <h6 class="product-title hurry-title d-block">
                                        @if($product->stock_status=='instock')
                                            InStock
                                        @else
                                            Out Of Stock
                                        @endif
                                      </h6>
                                </div>


                                    <form action="{{route('add_cart',$product->id)}}" method="POST">
                
                                    @csrf
                                    <div class="col">
                                    <input type="number" name="quantity" value="1"
                                    min="1" style="width: 300px; height:40px; margin-bottom: 20px;">
                                    
            
                                    <div class="product-buttons col-md-10">
                                        
                                        <div>
                                            <button type="submit" class="btn btn-solid-default"
                                            action="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span>Add To Cart</span></button>
                                        </div>
                                        </div>
                                        </form>
                                        
                                    </div>
                                <div class="border-product">
                                    <h6 class="product-title d-block">share it</h6>
                                    <div class="product-icon">
                                        <ul class="product-social">
                                            <li>
                                                <a href="https://www.facebook.com/">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.google.com/">
                                                    <i class="fab fa-google-plus-g"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li class="pe-0">
                                                <a href="https://www.google.com/">
                                                    <i class="fas fa-rss"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="cloth-review">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#desc" type="button">Description</button>

                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="desc">
                            <div class="shipping-chart">
                                {{$product->description}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection