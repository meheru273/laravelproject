@extends('layouts.app')
@include('admin.css')
@include('admin.sidebar')
<div class="main-panel">
<div class="bg-dark py-3">
    <h3 class="text-white text-center">Admin Panel</h3>
</div>

<div class="container">
            <div class="card-header d-flex justify-content-between align-items-center">
                    <a href="{{ route('show.plist') }}" class="btn btn-dark">Back</a> 
            </div> 
</div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-3">
                <div class="card-header">
                    <h3 class="text-black">Update Product</h3>
                </div>
                <form action="{{ route('admin.pupdate',$product->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="card-body">
                    <!-- Fields already provided -->
                    <!-- name -->
                    <div class="mb-3">
                        <label for="name" class="form-label h5">Name</label>
                        <input value="{{ old('name') }}" type="text" class="@error('name') is-invalid @enderror form-control-lg form-control" name="name" placeholder="Name">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug Field -->
                    <div class="mb-3">
                        <label for="slug" class="form-label h5">Slug</label>
                        <input value="{{ old('slug') }}" type="text" class="@error('slug') is-invalid @enderror form-control-lg form-control" name="slug" placeholder="Slug">
                        @error('slug')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Short Description Field -->
                    <div class="mb-3">
                        <label for="short_description" class="form-label h5">Short Description</label>
                        <textarea class="@error('short_description') is-invalid @enderror form-control-lg form-control" name="short_description" placeholder="Short Description">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="mb-3">
                        <label for="description" class="form-label h5">Description</label>
                        <textarea class="@error('description') is-invalid @enderror form-control-lg form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Regular Price Field -->
                    <div class="mb-3">
                        <label for="regular_price" class="form-label h5">Regular Price</label>
                        <input value="{{ old('regular_price') }}" type="number" class="@error('regular_price') is-invalid @enderror form-control-lg form-control" name="regular_price" placeholder="Regular Price" min="1">
                        @error('regular_price')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sale Price Field -->
                    <div class="mb-3">
                        <label for="sale_price" class="form-label h5">Sale Price</label>
                        <input value="{{ old('sale_price') }}" type="number" class="@error('sale_price') is-invalid @enderror form-control-lg form-control" name="sale_price" placeholder="Sale Price" min="0">
                        @error('sale_price')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- SKU Field -->
                    <div class="mb-3">
                        <label for="SKU" class="form-label h5">SKU</label>
                        <input value="{{ old('SKU') }}" type="text" class="@error('SKU') is-invalid @enderror form-control-lg form-control" name="SKU" placeholder="SKU" min="3">
                        @error('SKU')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Field (File Upload) -->
                    <div class="mb-3">
                        <label for="image" class="form-label h5">Image</label>
                        <input type="file" class="@error('image') is-invalid @enderror form-control-lg form-control" id="image" name="image">
                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Additional Images Field -->
                    <div class="mb-3">
                        <label for="images" class="form-label h5">Additional Images</label>
                        <input value="{{ old('images') }}" type="text" class="@error('images') is-invalid @enderror form-control-lg form-control" name="images" placeholder="Additional Images">
                        @error('images')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category ID Field -->


                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark btn-lg">Update</button>
                    </div>
                </div> 
                </form>
            </div>
        </div>
    </div>
</div>

@include('admin.script')
</div>
