@extends('layouts.base')

<style>
               .swal2-confirm {
                background-color: #D9730D !important; 
            }


            .swal2-confirm:hover {
                background-color: #C6690B !important; 
            }

            .swal2-popup {
                font-size: 12px; 
                width: auto;
                max-width: 400px;
            }
</style>
@section('content')
@include('sweetalert::alert')


<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="assets/images/fashion/banner/1.jpg" alt="Image" style="padding-right: 60px; padding-left: 60px;">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown theme-color">Organic Food Is Good For Health</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/images/fashion/banner/2.jpg" alt="Image" style="padding-right: 60px; padding-left: 60px;">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown theme-color">Natural Food Is Always Healthy</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <!-- banner section start -->
    <section class="ratio2_1 banner-style-2">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="collection-banner p-bottom p-center text-center">
                        <a href="shop-left-sidebar.html" class="banner-img">
                            <img src="assets/images/fashion/banner/4.jpg" class="bg-img blur-up lazyload" alt="">
                        </a>
                        <div class="banner-detail">
                            <a href="javacript:void(0)" class="heart-wishlist">
                                <i class="far fa-heart"></i>
                            </a>
                            
                            <span class="font-dark-30">BUY<span></span></span>
                        </div>
                        
                        <a href="shop-left-sidebar.html" class="contain-banner">
                            <div class="banner-content with-big">
                            <h2 class="mb-2">BUY</h2>
                                <span>Deals</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="collection-banner p-bottom p-center text-center">
                        <a href="shop-left-sidebar.html" class="banner-img">
                            <img src="assets/images/fashion/banner/3.jpg" class="bg-img blur-up lazyload" alt="">
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
                            <img src="assets/images/fashion/banner/5.jpg" class="bg-img blur-up lazyload" alt="">
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
                                        <li>
                                        <form action="{{ route('add_wishlist', $product->id) }}" method="POST">
                                            @csrf
                                            
                                                <button type="submit" class="btn btn-solid-default">
                                                <i data-feather="heart"></i>
                                                </button>
                                        </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add to Cart form
        document.getElementById('addCartForm').addEventListener('submit', function (e) {
            e.preventDefault();
            let form = this;
            let formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Handle the response data
            })
            .catch(error => console.error('Error:', error));
        });

        // Add to Wishlist form
        document.getElementById('addWishlistForm').addEventListener('submit', function (e) {
            e.preventDefault();
            let form = this;
            let formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data); // Handle the response data
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>
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

       <!-- Comments Section -->

       <style>
    /* CSS to hide scrollbar but allow scrolling */
    .scrollbar-hidden::-webkit-scrollbar {
        display: none; /* for Chrome, Safari, and Opera */
    }
    .scrollbar-hidden {
        -ms-overflow-style: none;  /* for Internet Explorer, Edge */
        scrollbar-width: none;  /* for Firefox */
    }
</style>

<div class="container p-sm-0">
            <div class="row m-0">
                <div class="col-12 p-0">
                    <div class="title-3 text-center">
                        <br><br><br><br>
                        <h2>Comment Here</h2>
                        <h5 class="theme-color">Your Opinion</h5>
                        <br><br>
                    </div>
                </div>
            </div>
    
<div class="container mt-4 card border-0 shadow my-1" style="background-color: ;">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-4" style="font-size: 30px; padding-top: 20px;">Comments</h1>
        </div>
        <div class="col-12">
            <form action="{{ route('add_comment') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <textarea class="form-control" name="comment" placeholder="Comment Something Here" style="height: 100px;"></textarea>
                </div>
                <input type="submit" class="btn btn-solid-default theme-color" style="color: black;" value="comment">
            </form>
        </div>
    </div>

    <div class="row mt-5 ">
        <div class="col-12">
            <h2 style="font-size: 20px; padding-bottom: 20px;">All Comments</h2>
        </div>
        <div class="col-12 " style="max-height: 500px; overflow-y: auto;">
            <div class="scrollbar-hidden">
                <!-- Example Comment -->
                @foreach($comment as $comment)
                <div class="mb-3">
                    <strong>{{$comment->name}}</strong>
                    <p style="color: black;">{{$comment->comment}}</p>
                    <a href="javascript:void(0);" class="btn btn-link theme-color" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>

                    @foreach($reply as $rep)
                    @if($rep->comment_id == $comment->id)
                    <div style="padding-left: 3%; padding-bottom: 10px;">
                        <strong>{{$rep->name}}</strong>
                        <p style="color: black;">{{$rep->reply}}</p>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-link theme-color" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                    @endif
                    @endforeach
                </div>
                @endforeach
                <div class="replyDiv" style="display: none;">
                    <form method="post" action="{{route('add_reply')}}">
                        @csrf
                        <input type="text" id="commentId" name="commentId" hidden>
                        <textarea class="form-control mb-2" placeholder="Write Some Comment" name="reply"></textarea>
                        <button type="submit" class="btn btn-solid-default" id="replyButton">Reply</button>
                        <a href="javascript:void(0);" class="btn theme-color" onClick="reply_close(this)">Close</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript to handle the reply functionality -->
<script>
    function reply(caller) {
        document.getElementById('commentId').value = $(caller).attr('data-Commentid');
        $('.replyDiv').insertAfter($(caller));
        $('.replyDiv').show();
    }
    function reply_close(caller) {
        $('.replyDiv').hide();
    }

    document.addEventListener("DOMContentLoaded", function (event) {
        var scrollpos = sessionStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
        sessionStorage.removeItem('scrollpos');
    });

    window.addEventListener("beforeunload", function (e) {
        sessionStorage.setItem('scrollpos', window.scrollY);
    });
    
</script>

<br><br><br>
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