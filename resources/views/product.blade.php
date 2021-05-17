@extends('main')

@section('content')
<div class="section" style="background-color: rgb(247, 247, 247)">
    <div class="container is-max-desktop">
        <div class="container" style="background-color: white; border-radius: 10px;">
            <div class="section">
                <!-- Images here -->
                @foreach($photos as $image)
                    <img src="/storage/photos/{{ $image->id . '.' . $image->extension}}" style="max-width: 300px;" alt="#">
                @endforeach
            </div>
            <div class="section" style="border-top: 1px solid rgb(218, 218, 218); padding-top: 15px">
                <h1 class="title is-3">{{ $product->name }}</h1>
                <label class="title is-3">{{ $product->price }} €</label>
            </div>

            <div class="section" style="border-top: 1px solid rgb(218, 218, 218);">
                    <div class="content">{{ $product->description }}</div>
            </div>
            <div class="section test" style="border-top: 1px solid rgb(218, 218, 218);">
                <label class="subtitle is-6">{{ $product->created_at }}</label>
                <div class="product-view">
                    <img src="/css/visitas.png" alt="#" width=20>
                    <label class="subtitle is-6">{{ $product->visits }}</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
