@include('admin.css')
@include('admin.sidebar')
@push('styles')
<style>
</style>
@endpush
<div class="main-panel">
<div class="bg-dark py-1" >
    <h3 class="text-white text-center">Admin Panel</h3>
</div>
<div class="bg-dark bg-gradiant py-1" >
    <h3 class="text-white text-center">Products</h3>
</div>
        
            <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('create.product') }}" class="btn btn-dark">Create</a> 
            </div> 

                <div class="container">
                    <div class="row d-flex justify-content-center">
                        @if(Session::has('success'))
                        <div class="col-md-10 mt-4">
                            <div class="alert alert-success">
                           {{Session::get('success')}} 
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                            <div class="container">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                    <th>ID</th>
                                    <th>Images</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>description</th>
                                    <th>price</th>
                                    <th>SKU</th>
                                    <th>images</th>
                                    <th>category_id</th>
                                    <th>Brand_id</th>
                                    </tr>
                                    @if($products->isNotEmpty())
                                    @foreach($products as $product)
                                    <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        @if($product->image!="")
                                        <img width="100" src="{{asset('assets/images/fashion/product/front')}}/{{$product->image}}">
                                        @endif
                                    </td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->slug}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{$product->regular_price}}</td>
                                    <td>{{$product->SKU}}</td>
                                    <td>{{$product->images}}</td>
                                    <td>{{$product->category_id}}</td>
                                    <td>{{$product->brand_id}}</td>
                                    </tr><tr>
                                    <td>{{\Carbon\Carbon::parse($product->created_at)->format('d M,Y')}}</th>
                                    <td>
                                        <a href="{{route('admin.pedit',$product->id)}}" class="btn btn-dark">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.pdelete', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    
                                </table>

                            </div>


@include('admin.script')

</div>
<!-- <script>
   function deleteProduct(id) {
    if (confirm("Are you sure you want to delete this?")) {
        
    }
}
</script> -->

