@extends('layouts.base')
@section('content')


    <!-- banner section start -->
    <section class="ratio2_1 banner-style-2">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="collection-banner p-bottom p-center text-center">
                        <a href="shop-left-sidebar.html" class="banner-img">
                            <img src="assets/images/fashion/banner/1.jpeg" class="bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="banner-detail">
                            <a href="javacript:void(0)" class="heart-wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                            
                            <span class="font-dark-30">BUY<span></span></span>
                        </div>
                        
                        <a href="shop-left-sidebar.html" class="contain-banner">
                            <div class="banner-content with-big">
                            <h2 class="mb-2">FREASH</h2>
                                <span>Deals</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collection-banner p-bottom p-center text-center">
                        <a href="shop-left-sidebar.html" class="banner-img">
                            <img src="assets/images/fashion/banner/2.jpg" class="bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="banner-detail">
                            <a href="javacript:void(0)" class="heart-wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                            <span class="font-dark-30">50% <span>OFF</span></span>
                        </div>
                        <a href="shop-left-sidebar.html" class="contain-banner">
                            <div class="banner-content with-big">
                                <h2 class="mb-2">FREASH</h2>
                                <span>New offer 50% off</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="collection-banner p-bottom p-center text-center">
                        <a href="shop-left-sidebar.html" class="banner-img">
                            <img src="assets/images/fashion/banner/3.jpeg" class="bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="banner-detail">
                            <a href="javacript:void(0)" class="heart-wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                            <span class="font-dark-30">36% <span>OFF</span></span>
                        </div>
                        <a href="shop-left-sidebar.html" class="contain-banner">
                            <div class="banner-content with-big">
                                <h2 class="mb-2">GROCERIES</h2>
                                <span>sale</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <section class="ratio_asos overflow-hidden">
        <div class="container p-sm-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="title-3 text-center">
                        <h2>New Arrival</h2>
                        <h5 class="theme-color">Our Collection</h5>
                    </div>
                </div>
            </div>
            <style>
                .r-price {
                    display: flex;
                    flex-direction: row;
                    gap: 20px;
                }

                .r-price .main-price {
                    width: 100%;
                }

                .r-price .rating {
                    padding-left: auto;
                }

                .product-style-3.product-style-chair .product-title {
                    text-align: left;
                    width: 100%;
                }

                @media (max-width:600px) {

                    .product-box p,
                    .product-box a {
                        text-align: left;
                    }

                    .product-style-3.product-style-chair .main-price {
                        text-align: right !important;
                    }
                }
            </style>
        
                <div class="row">
                    <!-- label and featured section -->

                    <!-- Prodcut setion -->
                    <div class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
                        @foreach ($products as $product)                            
                        <div>
                        <div class="product-box">
                            <div class="img-wrapper">
                                <div class="label-block">
                                    <span class="label label-theme">
                                    {{(($product->sale_price)/$product->regular_price)*100}}%
                                    </span>
                                </div>
                                <div class="front">
                                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                    <img src="assets/images/fashion/product/front/{{$product->image}}"
                                    class="bg-img blur-up lazyload" alt="">
                                    </a>
                                </div>
                                <div class="cart-wrap">
                                    <form action="{{route('add_cart',$product->id)}}" method="POST">
                                    
                                    @csrf
                                    <ul>
                                    <div>
                                    <input type="number" name="quantity" value="1"
                                    min="1" style="width: 100px; height:40px; margin-bottom: 20px;">
                                    </div>
                                    </ul>
                                    <ul>
                                    <li>
                                        <button type="submit" class="btn btn-solid-default"
                                        action="{{route('shop.product.details',['slug'=>$product->slug])}}">
                                            <i data-feather="shopping-cart"></i>
                                        </button>
                                    </li>
                                    </form>
                                        <li>
                                        <a href="{{route('shop.product.details',['slug'=>$product->slug])}}"
                                        class="btn btn-solid-default">
                                        <i data-feather="eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-details">
                                <div class="rating-details">
                                    <span class="font-light grid-content">{{$product->category->name}}</span>
                                    <ul class="rating mt-0">
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star theme-color"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fas fa-star"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="main-price">
                                    <a href="{{route('shop.product.details',['slug'=>$product->slug])}}" class="font-default">
                                        <h5 class="ms-0">{{$product->name}}</h5>
                                    </a>
                                    <div class="listing-content">
                                        <span class="font-light">{{$product->category->name}}</span>
                                        <p class="font-light">{{$product->short_description}}</p>
                                    </div>
                                    <h3 class="theme-color">${{$product->regular_price}}</h3>
                                    <button class="btn listing-content">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                  {{$products->links("pagination.default")}}

            </div>     
</section>

    <!-- category section start -->
    <section class="category-section ratio_40">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title title-2 text-center">
                        <h2>Our Category</h2>
                        <h5 class="text-color">Our collection</h5>
                    </div>
                </div>
            </div>
            <div class="row gy-3">
                <div class="col-xxl-2 col-lg-3">
                    <div class="category-wrap category-padding category-block theme-bg-color">
                        <div>
                            <h2 class="light-text">Top</h2>
                            <span>Categories</span>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-10 col-lg-9">
                    <div class="category-wrapper category-slider1 white-arrow category-arrow">
                        <div>
                            <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                                <img src="assets/images/fashion/product/front/27.jpg" class="bg-img blur-up lazyload"
                                    alt="category image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">Fresh</h3>
                                    <span class="text-dark">Dairy</span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                                <img src="assets/images/fashion/product/front/29.jpg" class="bg-img blur-up lazyload"
                                    alt="category image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">Fresh</h3>
                                    <span class="text-dark">Vegetables</span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                                <img src="assets/images/fashion/product/front/32.jpg" class="bg-img blur-up lazyload"
                                    alt="category image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">Fresh</h3>
                                    <span class="text-dark">Fruits</span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                                <img src="assets/images/fashion/product/front/16.jpg" class="bg-img blur-up lazyload"
                                    alt="category image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">Fresh</h3>
                                    <span class="text-dark">Meat</span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="shop-left-sidebar.html" class="category-wrap category-padding">
                                <img src="assets/images/fashion/product/front/20.jpg" class="bg-img blur-up lazyload"
                                    alt="category image">
                                <div class="category-content category-text-1">
                                    <h3 class="theme-color">Fresh</h3>
                                    <span class="text-dark">Carb</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category section end -->
    <style>
        .products-c .bg-size {
            background-position: center 0 !important;
        }
    </style>

    <!-- Subscribe Section Start -->
    <section class="subscribe-section section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="subscribe-details">
                        <h2 class="mb-3">Subscribe Our News</h2>
                        <h6 class="font-light">Subscribe and receive our newsletters to follow the news about our fresh
                            and fantastic Products.</h6>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-md-0 mt-3">
                    <div class="subsribe-input">
                        <div class="input-group">
                            <input type="text" class="form-control subscribe-input" placeholder="Your Email Address">
                            <button class="btn btn-solid-default" type="button">Button</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    @endsection 