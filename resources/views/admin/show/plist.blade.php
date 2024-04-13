@include('admin.css')
@include('admin.sidebar')
@push('styles')
<style>
table {
    font-family: 'Arial';
    font-size: 10px;
  margin: auto;
  width: 50%;
  padding-top: 50px;
  text-align: center;
  border-collapse: collapse;
  border: 2px solid #fff;
  border-bottom: 2px solid #00cccc;
  box-shadow: 0px 0px 20px rgba(0,0,0,0.10),
     0px 10px 20px rgba(0,0,0,0.05),
     0px 20px 20px rgba(0,0,0,0.05),
     0px 30px 20px rgba(0,0,0,0.05);
 
   td {
    color: #999;
    border: 1px solid #eee;
    padding: 8px 20px;
    border-collapse: collapse;
    width: auto;
  }
  th {
    
    color: #3A1E0F;
    text-transform: uppercase;
    font-size: 10px;
    width: auto;
    &.last {
      border-right: none;
    }
  }
}
</style>
@endpush
<div class="main-panel">
<div class="bg-dark py-3" >
    <h3 class="text-white text-center">Admin Panel</h3>
</div>
        
            <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('create.product') }}" class="btn btn-dark">Create</a> 
            </div> 

        <div class="col-md-20">
            <div class="card border-0 shadow-lg my-3">
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
            </div>
        <div>
                                <table class="table">
                                    <tr>
                                    <th>ID</th>
                                    <th></th>
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
                                        <img width="50" src="{{asset('assets/images/fashion/product/front')}}/{{$product->image}}">
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

