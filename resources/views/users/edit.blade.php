@extends('layout.app')
@section('content')

    <div class="mt-5 mb-5 text-center">
        <h1>Editar Usuario</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('usuarios.update', $user->id) }}" method="post" id="form-edit">
                                @csrf
                                @method("PUT")
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-user-alt"></span>
                                    </div>
                                    <input type="text" name="name_user" id="name_user" class="form-control font-input inputsTxt" placeholder="Nombre" value="{{ $user->name }}" >
                                </div><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                    <select class="form-select font-input inputsTxt" name="doc_type" id="doc_type">
                                        <option disabled value="">Seleccione el tipo de documento</option>
                                        <option value="1" {{ ($user->name==1)?'selected':'' }}>Cedula de ciudadanía</option>
                                        <option value="2" {{ ($user->name==2)?'selected':'' }}>Tarjeta de identidad</option>
                                        <option value="3" {{ ($user->name==3)?'selected':'' }}>Cedula de extranjería</option>
                                    </select>
                                </div><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                    <input type="number" name="doc_num" id="doc_num" class="form-control font-input inputsTxt" placeholder="Numero de documento" value="{{ $user->document_number }}" >
                                </div><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marked-alt"></span>
                                    </div>
                                    <input type="text" name="address" id="adress" class="form-control font-input inputsTxt" placeholder="Dirección" value="{{ $user->address }}" >
                                </div><br>
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="fas fa-calendar-week"></span>
                                    </div>
                                    <input type="date" name="date" id="date" class="form-control font-input inputsTxt" value="{{ $user->date_birth }}">
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-6 text-star">
                                        <a href="{{ route('usuarios.index') }}" type="reset" class="btn btn-danger border-rounded inputsTxt"><i class="fas fa-arrow-alt-left me-2"></i>Atrás</a>
                                    </div>
                                    <div class="col-md-6 text-end"> 
                                        <button type="submit" class="btn btn-success border-rounded inputsTxt"><i class="fas fa-user-plus me-2"></i>Actualizar registro</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center">
                                <img src="{{ asset('IMG/edit.svg') }}" alt="user-edit" width="600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <h2>{{ $user }}</h2> --}}

@endsection