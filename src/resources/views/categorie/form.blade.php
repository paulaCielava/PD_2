@extends('layout')

@section('content')

    h1>{{$title}}</h1>
    <hr>
    
    {!! var_dump($errors) !!}

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            Lūdzu, novērsiet radušās kļūdas!
        </div>
    @endif

    <form method="post" action="{{ $categorie->exists ? '/categories/patch/' . $categorie->id : '/categories/put' }}">
       @csrf

        <div class="mb-3">
            <label for="categorie-name"> Kategorija</label>

            <input 
                type="text" 
                id="categorie-name" 
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $categorie->name) }}">

            @error('name')
                <p>{{ $errors->first('name') }}</p>
            @enderror

        </div>


        <button type="submit" class="btn btn-primary"> {{ $car->exists ? 'Atjaunot' : "Pievienot" }} </button>

    </form>



@endsection