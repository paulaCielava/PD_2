
@extends('layout')

@section('content')

    <h1>{{$title}}</h1>
    <hr>

    @if (count($items) > 0)

        <table class="table table-striped table-hover table-sm"> 
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Nosaukums</th>
                    <th>Darbības</th>
                </tr>
            </thead>
            <tbody>

                @foreach($items as $categorie)
                <tr>
                    <td>{{ $categorie->id }}</td>
                    <td>{{ $categorie->name }}</td>
                    <td> 
                        <a href="/categories/update/{{ $categorie->id }}" class="btn btn-outline-primary btn-sm">Labot</a>
                        / 
                        <form method="post" action="/categories/delete/{{ $categorie->id }}" class="deletion-form d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Dzēst</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                

            </tbody>
        </table>

    @else

        <p>Nav atrasts neviens ieraksts</p>

    @endif

    <a href="/categories/create" class="btn btn-primary"> Prievienot jaunu kategoriju </a>

@endsection
