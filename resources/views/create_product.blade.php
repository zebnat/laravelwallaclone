@extends('main')

@section('content')
<section class="section">
    <div class="container is-max-desktop">
        <h1 class="title is-1">{{ $h1 ?? 'Añade producto' }}</h1>
        <form action="{{ route('post_product') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label class="label" for="productName">Nombre del producto</label>
                <div class="control">
                    <input class="input @error('productName') is-danger @enderror" id="productName" type="text" name="productName" placeholder="Nombre del producto" value="{{ old('productName') }}">
                    @error('productName')<small>{{ $message }}</small>@enderror
                </div>
            </div>
            <div class="field">
                <label class="label" for="price">Precio</label>
                <div class="control">
                    <input class="input @error('price') is-danger @enderror" id="price" type="number" name="price" placeholder="Precio" min ="1" value="{{ old('price') }}">
                    @error('price')<small>{{ $message }}</small>@enderror
                </div>
            </div>
            <div class="field">
                <label class="label" for="category">Categoría</label>
                <div class="control">
                    <div class="select @error('category') is-danger @enderror">
                        <select id="category" name="category">
                            <option value="">Selecciona una categoría</option>
                            <!-- @todo foreach -->
                            <option value="cat">cat here</option>
                        </select>
                    </div>
                </div>
                @error('category')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label class="label" for="decription">Descripción</label>
                <div class="control">
                    <textarea class="input @error('description') is-danger @enderror" id="description" type="text" name="description" placeholder="Añade una descripción" value="{{ old('description') }}"></textarea>
                </div>
                @error('description')<small>{{ $message }}</small>@enderror
            </div>
            <div class="field">
                <label class="label" for="img1">Imagen</label>
                <div class="control">
                    <input class="input @error('img1') is-danger @enderror" id="img1" type="file" name="img1" placeholder="" value="">
                    @error('img1')<small>{{ $message }}</small>@enderror
                </div>
            </div>
            <div class="field">
                <label class="label" for="img2">Imagen (opcional)</label>
                <div class="control">
                    <input class="input" id="img2" type="file" name="img2" placeholder="" value="">
                </div>
            </div>
            <div class="field">
                <label class="label" for="img3">Imagen (opcional)</label>
                <div class="control">
                    <input class="input" id="img3" type="file" name="img3" placeholder="" value="">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Añadir</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
