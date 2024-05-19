@include('admin.css')
@include('admin.sidebar')
<div class="main-panel">

<div class="card-header">
<div class="bg-dark py-2" >
    <h3 class="text-white text-center">Admin Panel</h3>
</div>
<div class="bg-dark py-2">
    <h3 class="text-white text-center">Brand</h3>
</div>
        
            <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('create.brand') }}" class="btn btn-dark">Create</a> 
            </div> 


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-20">
            
                
                    
                
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        @if(Session::has('success'))
                        <div class="col-md-10 mt-4">
                            <div class="alert alert-success">
                           {{Session::get('success')}} 
                            </div>
                        </div>
                        @endif
                    <div class="col-md-30">
                        
                            <div class="card-header bg-dark">
                                <h3 class="text-white">Brands</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                    <th>ID</th>
                                    <th></th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>image</th>
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
                                    <td>{{\Carbon\Carbon::parse($product->created_at)->format('d M,Y')}}</th>
                                    <td>
                                        <a href="{{route('admin.bedit',$product->id)}}" class="btn btn-dark">Edit</a>
                                    </td>
                                    <td>
                                    <td>
                                    <form action="{{ route('admin.bdelete', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                    </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    
                                </table>

                            </div>


                    </div>

        </div>
    </div>
   
</div>
</div>
@include('admin.script')

</div>
<script>
   function deleteProduct(id) {
    if (confirm("Are you sure you want to delete this?")) {
        var form = document.getElementById("delete-product-form-" + id);
        console.log("Submitting form for product id:", id);  
        form.submit();
    }
}
</script>

