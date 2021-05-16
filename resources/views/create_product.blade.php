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
                    <input class="input" id="productName" type="text" name="productName" placeholder="Nombre del producto" value="">
                </div>
            </div>
            <div class="field">
                <label class="label" for="price">Precio</label>
                <div class="control">
                    <input class="input" id="price" type="number" name="price" placeholder="Precio" min ="1" value="">
                </div>
            </div>
            <div class="field">
                <label class="label" for="category">Categoría</label>
                <div class="control">
                    <div class="select">
                        <select id="category" name="category">
                            <option value="default">Selecciona una categoría</option>
                            <!-- @todo foreach -->
                            <option value="cat">cat here</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label" for="decription">Descripción</label>
                <div class="control">
                    <textarea class="input" id="description" type="text" name="description" placeholder="Añade una descripción" value=""></textarea>
                </div>
            </div>
            <div class="field">
                <label class="label" for="img1">Imagen</label>
                <div class="control">
                    <input class="input" id="img1" type="file" name="img1" placeholder="" value="">
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
