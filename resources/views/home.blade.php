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
                                    <option value="">Todo</option>
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
                            <input class="input" id="minprice" type="number" name="minPrice" placeholder="0" value="">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label" for="maxprice">Precio máximo</label>
                        <div class="control">
                            <input class="input" id="maxprice" type="number" name="maxPrice" placeholder="0" value="">
                        </div>
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
<p>$NUM Products</p>
</section>
<section class="section columns is-multiline">
    <a class="card column is-one-quarter" href="{{ route('product', 1) }}">
        <div class="card-image">
            <figure class="image is-4by3">
                <img class="product-image-thumb" src="/images/1.jpg" alt="">
            </figure>
        </div>
        <div class="card-content">
            <div class="media-content">
                <p class="title is-4">ProductName</p>
                <p class="subtitle is-6">ProductPrice</p>
                <p class="subtitle is-7">ProductCat</p>
            </div>

            <div class="content">$PRODDESC</div>
        </div>
    </a>
</section>
@endsection
