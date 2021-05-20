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
                                    <option value="">Selecciona categoría</option>
                                    @foreach($cats as $cat)
                                    <option 
                                        class="option" 
                                        @if(Request::get('cat') == $cat->id) {{ 'selected' }} @endif 
                                        value="{{ $cat->id }}">
                                        {{ $cat->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="search">Buscar</label>
                        <div class="control">
                            <input class="input" id="search" type="text" name="search" placeholder="Busca tu producto" value="@if(Request::get('search')) {{ Request::get('search') }} @endif">
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label" for="minprice">Precio mínimo</label>
                        <div class="control">
                            <input class="input @error('minPrice') is-danger @enderror" id="minprice" type="number" name="minPrice" placeholder="0" 
                            value="@if(Request::get('minPrice') !== 0){{ Request::get('minPrice') }}@endif">
                        </div>
                        @error('minPrice') <small>{{ $message }}</small>@enderror
                    </div>
                    <div class="field">
                        <label class="label" for="maxprice">Precio máximo</label>
                        <div class="control">
                            <input class="input @error('maxPrice') is-danger @enderror" id="maxprice" type="number" name="maxPrice" placeholder="" 
                            value="@if(Request::get('maxPrice') !== 0){{ Request::get('maxPrice') }}@endif">
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
<p>Total: {{ $products->total() }} Product(s)</p>
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
                <p class="subtitle is-5">{{ $product->price }}€</p>
                <p class="subtitle is-6"><i>{{ $product->category->name }}</i></p>
            </div>

            <div class="content">{{ $product->description }}</div>
        </div>
        <div class="card-footer">
            <p class="subtitle is-6">Vendedor: {{ $product->user->name }}</p>
        </div>
    </a>
    @endforeach
</section>
<section class="section">
    {{  $products->links() }}
</section>
@endsection
