@include('admin.css')
@push('styles')
<style>
    .table_deg
    {
        border: 2px solid black;
        width: 70%;
        margin: auto;
        padding-top: 50px;
        text-align: center;
    }

</style>
@endpush
@include('admin.sidebar')
<div class="main-panel">
<div class="bg-dark bg-gradiant py-1" >
    <h3 class="text-white text-center">Orders</h3>
</div>
<div class="container" 
style="padding-left: 200px; padding-bottom: 40px;padding-top: 40px;">
    <form action="{{route('search')}}" method="get"> 
        <input type="text" name="search" placeholder="Search Orders" style=" width: 400px;">
        <input type="submit" value="Search" class="btn btn-solid-default">
    </form>
</div>
<div class="container">
    <table class="table table-striped table-bordered" style="text-size: 10px;">
        <thead class="thead-dark">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Slug</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($order as $order)
            <tr>
                <td><img src="assets/images/fashion/product/front/{{$order->image}}"
                 alt="Image" style="width:100px;"></td>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->slug}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    @if($order->delivery_status=='processing')
                    <a href="{{route('delivered',$order->id)}}"
                     class="btn btn-solid-default"
                     onclick="return confirm('Are you sure?')">status</a>
                    @else
                    <p style="color: green;">Delivered</p>
                    @endif
                </td>
            </tr>     
            @empty 
            <tr>
              <td colspan="10" style="text-align: center;"> No such Orders<td>
            </tr>     
             @endforelse
        </tbody>
    </table>
</div>


@include('admin.script')
</div>