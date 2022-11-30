@extends('layout.app')
@section('content')

    <div class="mt-5 text-center">
        <h1>Registro de usuarios</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card border-rounded">
                        <div class="card-header text-center">
                            <h5>Crea un nuevo usuario</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('usuarios.store') }}" method="post" class="mt-3">
                            @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-user-alt"></span>
                                    </div>
                                    <input type="text" name="name_user" id="name_user" class="form-control font-input inputsTxt" placeholder="Nombre" >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                    <select class="form-select font-input inputsTxt" name="doc_type" id="doc_type">
                                        <option selected disabled>Seleccione el tipo de documento</option>
                                        <option value="1">Cedula de ciudadanía</option>
                                        <option value="2">Tarjeta de identidad</option>
                                        <option value="3">Cedula de extranjería</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                    <input type="number" name="doc_num" id="doc_num" class="form-control font-input inputsTxt" placeholder="Numero de documento" >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marked-alt"></span>
                                    </div>
                                    <input type="text" name="address" id="adress" class="form-control font-input inputsTxt" placeholder="Dirección" >
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar-week"></span>
                                    </div>
                                    <input type="date" name="date" id="date" class="form-control font-input inputsTxt">
                                </div>
                                <div class="text-end mt-5">
                                    <button type="reset" class="btn btn-primary border-rounded inputsTxt"><i class="fas fa-eraser me-2"></i> Limpiar</button>
                                    <button type="submit" class="btn btn-success border-rounded inputsTxt"><i class="fas fa-user-plus me-2"></i> Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                     <div class="card border-rounded">
                        <div class="card-header text-center">
                            <h5>Listado de usuarios</h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo de documento</th>
                                    <th scope="col">Numero de documento</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Fecha de nacimiento</th>
                                    <th scope="col"class="text-center">Editar</th>
                                    <th scope="col"class="text-center">Eliminar</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php $document = ''; @endphp
                                    @forelse ($users as $user)
                                        @if ($user->document_type==1)
                                            @php $document = $user->document_type='Cedula de ciudadania'; @endphp
                                        @elseif ($user->document_type==2)
                                            @php $document = $user->document_type='Tarjeta de identidad'; @endphp
                                        @else
                                            @php $document = $user->document_type='Cedula de extranjeria'; @endphp
                                        @endif
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->document_type }}</td>
                                            <td>{{ $user->document_number }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->date_birth }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('usuarios.edit', $user->id) }}" class="btn btn-warning border-rounded"><span class="fas fa-pen"></span></a>
                                            </td>   
                                            <td class="text-center">
                                                <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" id="form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger border-rounded" type="submit"><span class="fas fa-trash"></span></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <th>No existe ningún usuario registrado.</th>
                                    @endforelse
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')

    <!-- Mensaje de confirmación -->
    <script> let time = 2000; </script>
    @if (session('success')=='registrado')
        <script>
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'El usuario ha sido registrado',
                showConfirmButton: false,
                timer: time
            });
        </script>
    @elseif (session('success')=='actualizado')
        <script>
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'El usuario ha sido actualizado',
                showConfirmButton: false,
                timer: time
            })
        </script>
    @elseif (session('success')=='eliminado')
        <script>
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'El usuario ha sido eliminado',
                showConfirmButton: false,
                timer: time
            })
        </script>
    @endif

@endsection