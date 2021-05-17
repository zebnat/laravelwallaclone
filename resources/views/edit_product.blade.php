@extends('main')

@section('content')
<section class="section">
    <div class="container is-max-desktop">
        <h1 class="title is-1">{{ $h1 ?? 'Edita producto' }}</h1>
        <!--
        <div class="notification is-success">
        Se actualizó satisfactoriamente! <a href="producto.php?id=1">Ver producto</a>
        </div>-->
        <form action="{{ route('product', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="field">
                <label class="label" for="name">Nombre del producto</label>
                <div class="control">
                <input class="input" id="name" type="text" name="name" placeholder="Tu título" value="{{ $product->name }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="description">Descripción del producto</label>
                <div class="control">
                <input class="input" id="name" type="text" name="description" placeholder="Tu descripción" value="{{ $product->description }}">
                </div>
            </div>
            <div class="field">
                <label class="label" for="price">Precio</label>
                <div class="control">
                <input class="input" id="price" type="number" name="price" placeholder="1000" value="{{ $product->price }}">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
