@extends('layouts.base')
@push('styles')
<link id="color-link" rel="stylesheet" type="text/css" href="{{asset('assets/css/demo2.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        nav svg{
            height: 20px;
        }
        .product-box .product-details h5 {            
            width: 100%;	
        }
    </style>
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
                    <h3>Shop</h3>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('app.index')}}">
                                    <i class="fas fa-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 category-side col-md-4">
                    <div class="category-option">
                        <div class="button-close mb-3">
                            <button class="btn p-0"><i data-feather="arrow-left"></i> Close</button>
                        </div>
                        <div class="accordion category-name" id="accordionExample">
                

                            <div class="accordion-item category-price">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour">Price</button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse show"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="range-slider category-list">
                                            <input type="text" class="js-range-slider" id="js-range-price" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item category-rating">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix">
                                        Category
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne">
                                    <div class="accordion-body category-scroll">
                                        <ul class="category-list">

                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="ct1" name="categories"
                                                        type="checkbox" value="1">
                                                    <label class="form-check-label">Qui Ut</label>
                                                    <p class="font-light">(7)</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="ct2" name="categories"
                                                        type="checkbox" value="2">
                                                    <label class="form-check-label">Blanditiis Error</label>
                                                    <p class="font-light">(8)</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="ct3" name="categories"
                                                        type="checkbox" value="3">
                                                    <label class="form-check-label">Quam Quos</label>
                                                    <p class="font-light">(0)</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="ct4" name="categories"
                                                        type="checkbox" value="4">
                                                    <label class="form-check-label">Cupiditate Minus</label>
                                                    <p class="font-light">(5)</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="ct5" name="categories"
                                                        type="checkbox" value="5">
                                                    <label class="form-check-label">Dolores Et</label>
                                                    <p class="font-light">(4)</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" id="ct6" name="categories"
                                                        type="checkbox" value="6">
                                                    <label class="form-check-label">Quis Repudiandae</label>
                                                    <p class="font-light">(0)</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven">
                                        Discount Range
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse show"
                                    aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="category-list">
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                        id="flexCheckDefault19">
                                                    <label class="form-check-label" for="flexCheckDefault19">5% and
                                                        above</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                        id="flexCheckDefault20">
                                                    <label class="form-check-label" for="flexCheckDefault20">10% and
                                                        above</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check ps-0 custome-form-check">
                                                    <input class="checkbox_animated check-it" type="checkbox"
                                                        id="flexCheckDefault21">
                                                    <label class="form-check-label" for="flexCheckDefault21">20% and
                                                        above</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="category-product col-lg-9 col-12 ratio_30">

                    <div class="row g-4">
                        <!-- label and featured section -->
                        <div class="col-md-12">
                            <ul class="short-name">


                            </ul>
                        </div>

                        <div class="col-12">
                            <div class="filter-options">
                                <div class="select-options">
                                    <div class="page-view-filter">
                                        <div class="dropdown select-featured">
                                            <select class="form-select" name="orderby" id="orderby">
                                                <option value="-1" selected="">Default</option>
                                                <option value="1">Date, New To Old</option>
                                                <option value="2">Date, Old To New</option>
                                                <option value="3">Price, Low To High</option>
                                                <option value="4">Price, High To Low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="dropdown select-featured">
                                        <select class="form-select" name="size" id="pagesize">
                                            <option value="12" selected="">12 Products Per Page</option>
                                            <option value="24">24 Products Per Page</option>
                                            <option value="52">52 Products Per Page</option>
                                            <option value="100">100 Products Per Page</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="grid-options d-sm-inline-block d-none">
                                    <ul class="d-flex">
                                        <li class="two-grid">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid-2.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="three-grid d-md-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid-3.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="grid-btn active d-lg-inline-block d-none">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/grid.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                        <li class="list-btn">
                                            <a href="javascript:void(0)">
                                                <img src="assets/svg/list.svg" class="img-fluid blur-up lazyload"
                                                    alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- label and featured section -->

                    <!-- Prodcut setion -->
                    <div class="row g-sm-4 g-3 row-cols-lg-4 row-cols-md-3 row-cols-2 mt-1 custom-gy-5 product-style-2 ratio_asos product-list-section">
    @foreach ($products as $product)                            
    <div>
    <div class="product-box">
        <div class="img-wrapper">
            <div class="front">
                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                    <img src="assets/images/fashion/product/front/{{$product->image}}"
                        class="bg-img blur-up lazyload" alt="">
                </a>
            </div>
            <div class="back">
                <a href="{{route('shop.product.details',['slug'=>$product->slug])}}">
                    <img src="assets/images/fashion/product/back/{{$product->image}}"
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
                        <a href="javascript:void(0)" class="wishlist">
                            <i data-feather="heart"></i>
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
            </div>
        </div>
    </section>
    <!-- Shop Section end -->
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
    
<div class="container mt-4 card border-0 shadow-lg my-1" style="background-color: ;">
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
            <h2 style="font-size: 20px;">All Comments</h2>
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

@endsection 