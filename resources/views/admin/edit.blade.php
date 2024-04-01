@extends('layouts.base')
@section('content')
<div class="bg-dark py-3">
    <h3 class="text-white text-center">Admin Panel</h3>
</div>

<div class="container">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('show.list') }}" class="btn btn-dark">Back</a> 
            </div> 
</div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-3">
                <div class="card-header">
                    <h3 class="text-black">Update Product</h3>
                </div>
                <form action="{{ route('admin.update',$product->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <!-- Fields already provided -->
                    <!-- name -->
                    <div class="mb-3">
                        <label for="name" class="form-label h5">Name</label>
                        <input value="{{ old('name',$product->name) }}" type="text" class="@error('name') is-invalid @enderror form-control-lg form-control" name="name" placeholder="Name">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label h5">Slug</label>
                        <input type="text" value="{{ old('name',$product->slug) }}" class="@error('slug') is-invalid @enderror form-control-lg form-control" id="slug" name="slug" placeholder="Unique slug">
                        @error('slug')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>
                    
                     <div class="mb-3">
                        <label for="image" class="form-label h5">Image</label>
                        <input type="file" class="@error('image') is-invalid @enderror form-control-lg form-control" id="image" name="image" placeholder="Image URL">
                        @error('image')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                        @if($product->image !="")
                        <img class="w-50 my-3" src="{{asset('assets/images/fashion/product/front')}}/{{$product->image}}">
                        @endif
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-lg">Update</button>
                    </div>
                </div> 
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
