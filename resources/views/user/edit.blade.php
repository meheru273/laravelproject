@extends('layouts.base')

@section('content')
    <div class="container">
        <h1>Edit Account Information</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('user.update', $user) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Address</label>
                <input type="text" class="form-control" id="phone" name="address" value="{{ $user->adress }}" required>
            </div>
            <button type="submit" class="btn btn-solid-default">Update</button>
        </form>
    </div>
@endsection
