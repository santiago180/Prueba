@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tareas') }}</div>

                @if(session('status'))
                    {{session('status')}}
                @endif

                <div class="card-body">
                    <a href="{{ route('Tareas.create') }}">Crear tarea</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>hora</th>
                                <th>Modificar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tareas as $tarea)
                                <tr>
                                    <td>{{ $tarea->id }}</td>
                                    <td>{{ $tarea->nombre }}</td>
                                    <td>{{ $tarea->descripcion }}</td>
                                    <td>{{ $tarea->fecha }}</td>
                                    <td>{{ $tarea->hora }}</td>
                                    <td><a href="{{route('Tareas.edit',$tarea)}}">Editar</a></td>
                                    <td>
                                        <form method="POST" action="{{ route('Tareas.destroy',$tarea) }}">
                                            @csrf @method('DELETE')
                                            <button type="submit">Borar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Aún No tiene tareas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
