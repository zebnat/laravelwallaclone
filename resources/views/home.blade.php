@extends('main')

@section('content')
<section class="section">
    <div class="container is-max-desktop">
        <h1 class="title is-1">{{ $h1 ?? 'Listado de productos' }}</h1>
        <form action="{{ route('home') }}" method="GET">
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label" for="category">Categorías</label>
                        <div class="control">
                            <div class="select">
                                <select id="category" name="cat">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="search">Buscar</label>
                        <div class="control">
                            <input class="input" id="search" type="text" name="search" placeholder="" value="">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="minprice">Precio mínimo</label>
                        <div class="control">
                            <input class="input @error('minPrice') is-danger @enderror" id="minprice" type="number" name="minPrice" placeholder="0" value="">
                        </div>
                        @error('minPrice') <small>{{ $message }}</small>@enderror
                    </div>
                    <div class="field">
                        <label class="label" for="maxprice">Precio máximo</label>
                        <div class="control">
                            <input class="input @error('maxPrice') is-danger @enderror" id="maxprice" type="number" name="maxPrice" placeholder="0" value="">
                        </div>
                        @error('maxPrice') <small>{{ $message }}</small>@enderror
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="sortby">Ordenar por:</label>
                        <div class="control">
                            <div class="select">
                                <select id="sortBy" name="sortBy">
                                    <option value="0">Fecha</option>
                                    <option value="1">Precio</option>
                                    <option value="2">>Nombre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="desc">Dirección:</label>
                        <div class="control">
                            <div class="select">
                                <select id="desc" name="desc">
                                    <option value="1">Descendente</option>
                                    <option value="0">Ascendente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">Filtrar</button>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
<section class="section">
<p>{{ count($products) }} Product(s)</p>
</section>
<section class="section columns is-multiline">
    @foreach($products as $product)
    <a class="card column is-one-quarter" href="{{ route('product', $product->id) }}">
        @foreach($product->mainphoto as $mainphoto)
        <div class="card-image">
            <figure class="image is-4by3">
                <img class="product-image-thumb" src="/storage/photos/{{ $mainphoto->id . '.'. $mainphoto->extension }}" alt="">
            </figure>
        </div>
        @endforeach
        <div class="card-content">
            <div class="media-content">
                <p class="title is-4">{{ $product->name }}</p>
                <p class="subtitle is-6">{{ $product->price }}€</p>
                <p class="subtitle is-7">{{ $product->category->name }}</p>
            </div>

            <div class="content">{{ $product->description }}</div>
        </div>
    </a>
    @endforeach
</section>
@endsection
