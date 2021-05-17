@extends('main')

@section('content')
<section class="section is-widescreen">
    <h1 class="is-1">{{ $h1 ?? 'Tus productos' }}</h1>
    <div class="box">
        <a href="{{ route('create_product') }}" class="button">Nuevo Producto</a>
        <h2 class="is-2 is-block">Tus productos:</h2>
    </div>
    <div class="columns is-multiline">
        @foreach($products as $product)
        <div class="card column is-one-quarter" >
            <div class="card-image">
                @foreach($product->mainphoto as $mainphoto)
                <figure class="image is-4by3">
                <img class="product-image-thumb" src="/storage/photos/{{ $mainphoto->id . '.'. $mainphoto->extension }}" alt="product name">
                </figure>
                @endforeach
            </div>
            <div class="card-content">
                <div class="media-content">
                    <p class="title is-4">{{ $product->name }}</p>
                    <p class="subtitle is-6">{{ $product->price }}€</p>
                    <p class="subtitle is-7">{{ $product->category->name }}</p>
                </div>

                <div class="content">{{ $product->description }}</div>
            </div>
            <footer class="card-footer">
                <a class="card-footer-item" href="{{ route('edit_product', $product->id) }}">Editar producto</a>
                <form action="{{ route('delete_product', $product->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="card-footer-item is-link">Eliminar producto</button>
                </form>
                <a class="card-footer-item" href="{{ route('product', $product->id) }}">Visitar Producto</a>
            </footer>
        </div>
        @endforeach
        @if(count($products) == 0)
        <div class="column">
            <p>No tienes productos</p>
        </div>
        @endif
    </div>
</section>
@endsection
