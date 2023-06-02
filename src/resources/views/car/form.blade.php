
@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            Lūdzu, novērsiet radušās kļūdas!
        </div>
    @endif

 
    <form method="post" action="{{ $car->exists ? '/cars/patch/' . $car->id : '/cars/put' }}" enctype="multipart/form-data">
        @csrf


        <div class="mb-3">
            <label for="car-name" class="form-label">Mašīnas nosaukums</label>

            <input
                type="text"
                id="car-name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $car->name) }}"
            >

            @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="car-razotajs" class="form-label">Ražotājs</label>

            <select
                id="car-razotajs"
                name="razotajs_id"
                class="form-select @error('razotajs_id') is-invalid @enderror"
            >
                <option value="">Norādiet ražotāju!</option>
                    @foreach($razotajs as $razotajs)
                        <option
                            value="{{ $razotajs->id }}"
                            @if ($razotajs->id == old('razotajs_id', $car->razotajs->id ?? false)) selected @endif
                        >{{ $razotajs->name }}</option>
                    @endforeach
            </select>

            @error('razotajs_id')
                <p class="invalid-feedback">{{ $errors->first('razotajs_id') }}</p>
            @enderror
        </div>


        <div class="mb-3">
            <label for="car-description" class="form-label">Apraksts</label>

            <textarea
                id="car-description"
                name="description"
                class="form-control @error('description') is-invalid @enderror"
            >{{ old('description', $car->description) }}</textarea>

            @error('description')
                <p class="invalid-feedback">{{ $errors->first('description') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="car-year" class="form-label">Ražošanas gads</label>

            <input
                type="number" max="{{ date('Y') + 1 }}" step="1"
                id="car-year"
                name="year"
                value="{{ old('year', $car->year) }}"
                class="form-control @error('year') is-invalid @enderror"
            >

            @error('year')
                <p class="invalid-feedback">{{ $errors->first('year') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="car-price" class="form-label">Cena</label>

            <input
                type="number" min="0.00" step="0.01" lang="en"
                id="car-price"
                name="price"
                value="{{ old('price', $car->price) }}"
                class="form-control @error('price') is-invalid @enderror"
            >

            @error('price')
                <p class="invalid-feedback">{{ $errors->first('price') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="car-image" class="form-label">Attēls</label>

            @if ($car->image)
                <img
                    src="{{ asset('images/' . $car->image) }}"
                    class="img-fluid img-thumbnail d-block mb-2"
                    alt="{{ $car->name }}"
                >
            @endif

            <input
                type="file" accept="image/png, image/jpeg"
                id="car-image"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
            >

        </div>

        //

        <div class="mb-3">
            <div class="form-check">
                <input
                    type="checkbox"
                    id="car-display"
                    name="display"
                    value="1"
                    class="form-check-input @error('display') is-invalid @enderror"
                    @if (old('display', $car->display)) checked @endif
                >
                <label class="form-check-label" for="car-display">
                    Publicēt ierakstu
                </label>

                @error('display')
                    <p class="invalid-feedback">{{ $errors->first('display') }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">{{ $car->exists ? 'Atjaunot' : 'Pievienot' }}</button>

    </form>

@endsection
