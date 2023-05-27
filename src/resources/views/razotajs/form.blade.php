@extends('layout')

@section('content')

    h1>{{$title}}</h1>
    <hr>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            Lūdzu, novērsiet radušās kļūdas!
        </div>
    @endif

    <form method="post" action="{{ $razotajs->exists ? '/razotajs/patch/' . $razotajs->id : '/razotajs/put' }}">
       @csrf

        <div class="mb-3">
            <label for="razotajs-name"> Ražotāja nosaukums </label>

            <input 
                type="text" 
                id="razotajs-name" 
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $razotajs->name) }}">

            @error('name')
                <p>{{ $errors->first('name') }}</p>
            @enderror

        </div>


        <button type="submit" class="btn btn-primary"> {{ $razotajs->exists ? 'Atjaunot' : "Pievienot" }} </button>

    </form>



@endsection