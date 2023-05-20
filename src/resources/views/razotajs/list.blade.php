
@extends('layout')

@section('content')

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

                @foreach($items as $razotajs)
                <tr>
                    <td>{{ $razotajs->id }}</td>
                    <td>{{ $razotajs->name }}</td>
                    <td> 
                        <a href="/razotajs/update/{{ $razotajs->id }}" class="btn btn-outline-primary btn-sm">Labot</a>
                        / Dzēst
                    </td>
                </tr>
                @endforeach
                

            </tbody>
        </table>

    @else

        <p>Nav atrasts neviens ieraksts</p>

    @endif

    <a href="/razotajs/create" class="btn btn-primary"> Prievienot jaunu ražotāju </a>

@endsection
