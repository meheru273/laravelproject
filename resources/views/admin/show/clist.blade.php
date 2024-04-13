@include('admin.css')
@include('admin.sidebar')
<div class="main-panel">
<div class="bg-dark py-1" >
    <h3 class="text-white text-center">Admin Panel</h3>
</div>
<div class="bg-dark py-1">
    <h3 class="text-white text-center">Category</h3>
</div>
        
            <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('create.category') }}" class="btn btn-dark">Create</a> 
            </div> 


<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-20">
            <div class="card border-0 shadow-lg my-3">
                <div class="card-header">
                    <h3 class="text-black">Create Product</h3>
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
                    <div class="col-md-20">
                        <div class="card borde-0 shadow-lg my-4">
                            <div class="card-header bg-dark">
                                <h3 class="text-white">Products</h3>
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
                                        <a href="{{route('admin.cedit',$product->id)}}" class="btn btn-dark">Edit</a>
                                    </td>
                                    <td>
                                    <td>
                                    <form action="{{ route('admin.cdelete', $product->id) }}" method="POST">
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
   
</div>

@include('admin.script')

</div>


