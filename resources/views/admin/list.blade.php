@extends('layouts.base')
@section('content')
<div class="bg-dark py-3" >
    <h3 class="text-white text-center">Admin Panel</h3>
</div>
        <div class="container">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.index') }}" class="btn btn-dark">Create</a> 
            </div> 
        </div>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
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
                    <div class="col-md-10">
                        <div class="card borde-0 shadow-lg my-4">
                            <div class="card-header bg-dark">
                                <h3 class="text-white">PRoducts</h3>
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
                                        <a href="{{route('admin.edit',$product->id)}}" class="btn btn-dark">Edit</a>
                                    </td>
                                    <td>
                                        <a href="#" onclick="deleteProduct({{ $product->id }})" class="btn btn-danger">Delete</a>
                                        <form id="delete-product-form-{{ $product->id }}" action="{{ route('admin.delete', $product->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        
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
<script>
    function deleteProduct(id)
    {
        if(confirm("Are you sure you want to delete this?"))
        {
            document.getElementById("delete-product-form-" + id).submit();
        }
    }
</script>

@endsection