@extends('plantilla')
@section('contenido')


<div class="card mx-auto" style="width: 28rem;position:relative;top:30px">
    <div class="card-header bg-dark text-white">Editar Estudiante</div>
    <div class="card-body">
        <form id="frmestudiantes" method="POST" action="{{url("estudiantes",[$estudiante])}}" >
            @method("put")
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" value="{{$estudiante->nombre}}" class="form-control" id="nombre" required>
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" name="edad" value="{{$estudiante->edad}}" class="form-control" id="edad" required><br>
                <select name="id_carrera" class="form-select" required>
                    <option value="">Carrera</option>
                    @foreach($carreras as $row)
                    @if ($row->id == $estudiante->id_carrera)
                    <option selected value="{{$row->id}}">{{$row->carrera}}</option>
                    @else
                    <option value="{{$row->id}}">{{$row->carrera}}</option>
                    @endif
                    @endforeach
                  </select>
            </div>
            <button class="btn btn-success float-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
              </svg> Actualizar</button>

          </form>
    </div>
  </div>

@endsection