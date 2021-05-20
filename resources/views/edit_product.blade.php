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
                <input class="input @error('name') is-danger @enderror" id="name" type="text" name="name" placeholder="Tu título" value="{{ $product->name }}">
                </div>
                @error('name') <small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label class="label" for="description">Descripción del producto</label>
                <div class="control">
                <input class="input @error('description') is-danger @enderror" id="name" type="text" name="description" placeholder="Tu descripción" value="{{ $product->description }}">
                @error('description') <small>{{ $message }}</small>@enderror
                </div>
            </div>
            <div class="field">
                <label class="label" for="price">Precio</label>
                <div class="control">
                <input class="input @error('price') is-danger @enderror" id="price" type="number" name="price" placeholder="1000" value="{{ $product->price }}">
                @error('price') <small>{{ $message }}</small>@enderror
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
