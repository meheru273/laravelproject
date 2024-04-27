@extends('layouts.base')

@section('content')
    <h1 class="rh1">Our Recipe Blog</h1>
    @if(isset($recipes['results']))
        <ul class="rul">
            @foreach($recipes['results'] as $recipe)
                <li class="rlist">
                    <img src="{{ $recipe['image'] ?? 'default-image-url.jpg' }}" alt="{{ $recipe['title'] }}" class="rimg">
                    <div class="recipe-description">
                        <div class="recipe-title">{{ $recipe['title'] }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

@push('styles')
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
    }
    .rh1 {
        color: #333;
        padding:20px;
    }
    .rul {
        list-style-type: none;
        padding: 0;
    }
    .rlist {
        margin-bottom: 10px;
        background-color: #fff;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
    }
    .rimg {
        width: 100px; /* Adjust based on your needs */
        height: 100px; /* Adjust based on your needs */
        object-fit: cover;
        border-radius: 5px;
        margin-right: 10px;
    }
    .recipe-description {
        display: flex;
        flex-direction: column;
    }
    .recipe-title {
        font-size: 16px;
        font-weight: bold;
        color: #2a2a2a;
    }
    .recipe-summary {
        font-size: 14px;
        color: #666;
        margin-top: 5px;
    }
</style>
@endpush
