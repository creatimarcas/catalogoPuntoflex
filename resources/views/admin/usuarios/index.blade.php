@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Listado de Usuarios</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>
                    <div class="card-tools">
                        <a href="{{url('/admin/usuarios/create')}}" class="btn btn-primary"><i class="bi bi-person-fill-add"></i>Nuevo Usuario</a>
                    </div>
                </div>
                   
                    <div class="card-body">
                        <table class="table table-bordered table-sm table-striped table-hover">
                            <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                            </thead>
                            <tbody>
                               @php  $contador = 0; @endphp

                                @foreach ($usuarios as $usuario)
                                    @php  $contador++; @endphp
                                  <tr>
                                    <td style="text-align:center">{{$contador}}</td>
                                    <td>{{$usuario -> name}}</td>
                                    <td>{{$usuario -> email}}</td>
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{route('usuarios.show',$usuario->id)}}" type="button" class="btn btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{route('usuarios.edit',$usuario->id)}}" type="button" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                            <form id="delete-form-{{$usuario->id}}" action="{{route('usuarios.destroy',$usuario->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{$usuario->id}})" class="btn btn-danger" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                            </form>
                                          </div>
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
        </div>
    </div>

    <script>
    function confirmDelete(userId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
    </script>
@endsection