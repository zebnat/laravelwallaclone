@extends('main')

@section('content')
<section class="section is-widescreen">
    <h1 class="is-1">{{ $h1 ?? 'Tus productos' }}</h1>
    <div class="box">
        <a href="{{ route('create_product') }}" class="button">Nuevo Producto</a>
        <h2 class="is-2 is-block">Tus productos:</h2>
    </div>
    <div class="columns is-multiline">
        <!-- foreach -->
            <div class="card column is-one-quarter" >
            <div class="card-image">
                <figure class="image is-4by3">
                <img class="product-image-thumb" src="/images/1.jpg" alt="product name">
                </figure>
            </div>
            <div class="card-content">
                <div class="media-content">
                    <p class="title is-4">$Productname</p>
                    <p class="subtitle is-6">$productprice</p>
                    <p class="subtitle is-7">$productcat</p>
                </div>

                <div class="content">$productdesc</div>
            </div>
            <footer class="card-footer">
                <a class="card-footer-item" href="{{ route('edit_product', 1) }}">Editar producto</a>
                <form action="{{ route('delete_product', 1) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="card-footer-item is-link">Eliminar producto</button>
                </form>
                <a class="card-footer-item" href="{{ route('product', 1) }}">Visitar Producto</a>
            </footer>
        </div>
        <!-- If no products
        <div class="column">
            <p>No tienes productos</p>
        </div>-->
    </div>
</section>
@endsection
