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
            </div>
        </div>
    </div>
</div>


@endsection