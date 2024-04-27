@extends('layouts.base')
@section('content')

    <!-- Breadcrumb section end -->

    <!-- user dashboard section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs custome-nav-tabs flex-column category-option" id="myTab">
                        <li class="nav-item mb-2">
                            <button class="nav-link font-light active" id="tab" data-bs-toggle="tab" data-bs-target="#dash" type="button"><i class="fas fa-angle-right"></i>Dashboard</button>
                        </li>

                        <li class="nav-item mb-2">
                            <button class="nav-link font-light" id="1-tab" data-bs-toggle="tab" data-bs-target="#order" type="button"><i class="fas fa-angle-right"></i>Orders</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link font-light" id="6-tab" data-bs-toggle="tab" data-bs-target="#security" type="button"><i class="fas fa-angle-right"></i>Security</button>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="filter-button dash-filter dashboard">
                        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dash">
                            <div class="dashboard-right">
                                <div class="dashboard">
                                    <div class="page-title title title1 title-effect">
                                        <h2>My Dashboard</h2>
                                    </div>
                                    <div class="welcome-msg">
                                        <h6 class="font-light">Hello, <span>{{$user->name}}</span></h6>
                                        <p class="font-light">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="order-box-contain my-4">
                                        <div class="row g-4">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/box.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/box1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">total order</h5>
                                                            <h3>{{$total_order}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/sent.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/sent1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">Total Processing</h5>
                                                            <h3>{{$total_processing}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="order-box">
                                                    <div class="order-box-image">
                                                        <img src="assets/images/svg/wishlist.png" class="img-fluid blur-up lazyload" alt="">
                                                    </div>
                                                    <div class="order-box-contain">
                                                        <img src="assets/images/svg/wishlist1.png" class="img-fluid blur-up lazyload" alt="">
                                                        <div>
                                                            <h5 class="font-light">wishlist</h5>
                                                            <h3>{{$total_wishlist}}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-account box-info">
                                        <div class="box-head">
                                            <h3>Account Information</h3>
                                        </div>
                                        @if(session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="box">
                                                    <div class="box-title">
                                                        <h2>Contact Information</h2><a href="{{ route('user.edit', $user) }}">Edit</a>
                                                    </div>
                                                    <div class="box-content">
                                                        <h4 class="font-light">{{$user->name}}</h4><br>
                                                        <h4 class="font-light">{{$user->email}}</h4><br>
                                                        <h4 class="font-light">{{$user->phone}}</h4><br>
                                                        <a href="{{ route('user.change-password', $user) }}">Change Password</a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div>
                                            <div class="box address-box">
                                                <div class="box-title">
                                                    <h3>Address Book</h3>
                                                </div>
                                                <div class="box-content">
                                                    <div class="row g-4">
                                                        <div class="col-sm-6">
                                                            <h4 class="font-light">{{$user->address}}</h4>
                                                            <h4 class="font-light">You have not set a default
                                                                billing address.</h4>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade table-dashboard dashboard wish-list-section" id="order">
                        <div class="order-details">
                            <div class="box-head mb-3">
                                <h3>My Order</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table cart-table">
                                    <thead>
                                        <tr class="table-head">
                                            <th scope="col">Image</th>
                                            <th scope="col">Product Slug</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Delivery Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order as $order)
                                        <tr>
                                            <td>
                                                <a href="details.php">
                                                    <img src="assets/images/fashion/product/front/{{$order->image}}" class="blur-up lazyload" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <p class="mt-0">{{$order->slug}}</p>
                                            </td>
                                            <td>
                                                <p class="fs-6 m-0">{{$order->quantity}}</p>
                                            </td>
                                            <td>
                                                <p class="success-button btn btn-sm">{{$order->price}}</p>
                                            </td>
                                            <td>
                                                <p class="theme-color fs-6">{{$order->payment_status}}</p>
                                            </td>
                                            <td>
                                            <p class="theme-color fs-6">{{$order->delivery_status}}</p>
                                            </td>
                                            </tr><tr>
                                            <td>
                                            @if($order->delivery_status=='processing')
                                            <a class="btn btn-solid-default"
                                            href="{{route('cancel_order',$order->id)}}"
                                            onclick="return confirm('Are you sure?')">
                                                Cancle Order</a>
                                            @else
                                                <h2>Not possible</h2>
                                            @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div></div>
                        <script>
                                        $(document).ready(function() {
                                        var hash = window.location.hash;
                                        if (hash) {
                                            $('.nav-tabs a[href="' + hash + '"]').tab('show');
                                        }
                                        });</script>


                        <div class="tab-pane fade dashboard-security dashboard" id="security">
                            <div class="box-head">
                                <h3>Delete Your Account</h3>
                            </div>
                            <div class="security-details">
                                <h5 class="font-light mt-3">Hi <span> Mark Enderess,</span>
                                </h5>
                                <p class="font-light mt-1">We Are Sorry To Here You Would Like To Delete Your Account.
                                </p>
                            </div>

                            <div class="security-details-1 mb-0">
                                <div class="page-title">
                                    <h4 class="fw-bold">Note</h4>
                                </div>
                                <p class="font-light">Deleting your account will permanently remove your profile,
                                    personal settings, and all other associated information. Once your account is
                                    deleted, You will be logged out and will be unable to log back in.</p>

                                <p class="font-light mb-4">If you understand and agree to the above statement, and would
                                    still like to delete your account, than click below</p>

                                <!-- Button to open modal -->
<button class="btn btn-solid-default btn-sm fw-bold rounded" data-bs-toggle="modal" data-bs-target="#deleteModal">
    Delete Your Account
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your account?
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('user.delete', $user->id) }}">
                    @csrf
                    @method('DELETE') 
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-solid-default">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- user dashboard section end -->

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
    <!-- Subscribe Section End -->

    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
        var scrollpos = sessionStorage.getItem('scrollpos');
        if (scrollpos) {
            window.scrollTo(0, scrollpos);
            sessionStorage.removeItem('scrollpos');
        }
    });

    window.addEventListener("beforeunload", function (e) {
        sessionStorage.setItem('scrollpos', window.scrollY);
    });
    </script>
@endsection