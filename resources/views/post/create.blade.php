@extends('layouts.admin')

@section('content')
    <form action="{{route('post.store')}}" method="POST">
        @csrf <!-- proteccion formularios -->
        <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="title" placeholder="Ingrese el título">
        </div>
        <div class="form-group">
            <label>Descripción</label>
            <input type="text" class="form-control" name="description" placeholder="Ingrese la descripción">
        </div>
        <button class="btn btn-dark" type="submit">Enviar</button>

    </form>
@endsection