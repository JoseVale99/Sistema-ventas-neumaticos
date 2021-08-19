@extends('layouts.main')
@section('titulo', 'Editar cliente')
@section('contenido')

    <!-- Page Wrapper -->
    <div id="wrapper">
        {{-- incluimos sildebar color: azul :) --}}
        @include('plantilla.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.nav-log')

                <!-- Begin Page Content -->
                <div class="container-fluid rounded color">
                    @csrf
                    <br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 bold-title"> VER DATOS CLIENTE <i class="fas fa-eye"></i> </h1>
                    <p class="mb-4 text-dark">Actualice los datos de los clientes aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">ID Cliente: {{$cliente->id}}</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        
                        <div class="container">
                           
                           
                                <div class="row">

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Nombre del cliente</label>
                                            <input type="text" name="nombre" value="{{ old('nombre',$cliente->nombre) }}"
                                                placeholder="Nombre del cliente" disabled
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('nombre')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Apellido Paterno</label>
                                            <input type="text" name="apellido_p" value="{{ old('apellido_p',$cliente->apellido_p) }}"
                                                placeholder="Apellido paterno" disabled
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('apellido_p')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Apellido Materno</label>
                                            <input type="text" name="apellido_m" value="{{ old('apellido_m',$cliente->apellido_m) }}"
                                                placeholder="Apellido materno" disabled
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('apellido_m')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Dirección</label>
                                            <textarea class="form-control text-upper"
                                                placeholder="Direccion del cliente..." disabled
                                                name="direccion">{{ old('direccion',$cliente->direccion) }}</textarea>

                                            {{-- validaciones --}}
                                            @error('direccion')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>

                                   

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">E-mail</label>
                                                    <input type="text" name="correo" value="{{ old('correo',$cliente->correo) }}"
                                                        placeholder="CORREO ELECTRONICO" disabled
                                                        class="form-control">

                                                    {{-- validaciones --}}
                                                    @error('correo')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <label class="text-black h4">Telefono</label>
                                                    <input type="text" name="telefono" value="{{ old('telefono',$cliente->telefono) }}"
                                                        placeholder="telefono " disabled
                                                        class="form-control text-upper">

                                                    {{-- validaciones --}}
                                                    @error('telefono')
                                                        <div class="message-error">*{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>



                                            
                                        </div>

                                        {{-- PARTE BOTONES --}}
                                        
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-auto">
                                                <a title="guardar datos" href="{{route('clientes.edit',[$cliente])}}" class="btn btn-primary btn-ms">
                                                    ir a editar <i class="fas fa-edit"></i></a>
                                            </div>
                                            
                                            <div class="col-auto">
                                                <a title="cancelar producto" href={{ route('clientes.index') }} class="btn btn-danger btn-ms">cancelar
                                                    <i class="fas fa-strikethrough"></i></a>
                                            </div>
                                       
                                        </div>
                                        <br>

                                    
                                    
                                </div>
                                
                            </div>
                            <br>

                  

                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    @include('plantilla.footer')
                    <!-- End of Footer -->
                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

        @endsection
