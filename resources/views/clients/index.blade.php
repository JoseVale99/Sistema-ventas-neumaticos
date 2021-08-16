@extends('layouts.main')
@section('titulo', 'Clientes')
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
                    <br>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 bold-title text-upper"> Listado de Clientes  <i class="fas fa-user"></i></h1>
                    <p class="mb-4 text-dark">Consulte los datos de sus clientes aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold">Búsqueda de clientes</h6>
                        </div>


                        <div class="card shadow  rounded card-color">
                            <div class="container">
                                
                                {{-- <form action="{{ route('productos.index', [$productos]) }}" method="GET"> --}}
                                    <form action="{{ route('clientes.index',[$clientes]) }}" method="GET">
                                    <div class="row">

                                        {{-- add product --}}
                                        <div class="col-md-3 mt-4">
                                            <div class="form-group">
                                                <a title="agregar nuevo cliente" type="button" class="btn btn-outline-primary btn-auto mx-3 text-black2"
                                                    href="{{ route('clientes.create') }}"> 
                                                     nuevo cliente <i class="fas fa-plus-circle"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-2 mt-4">
                                            <div class="form-group">
                                                @php($arrayB = [
                                                    'nombre',
                                                    'direccion',
                                                    'telefono',
                                                    'fecha',
                                                    'correo'
                                                    // 'PRECIO COMPRA','PRECIO VENTA'
                                                    ])
                                                    <select title="buscar por" class="form-control text-upper" name="type">
                                                        @foreach ($arrayB as $buscar)
                                                            <option>{{ $buscar }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md-4 mt-4">
                                                <div class="form-group">
                                                    <input class="form-control" name="buscarpor" type="search"
                                                        placeholder="Buscar">

                                                </div>
                                            </div>


                                            <div class="col-md-3 mt-4">
                                                <div class="form-group">
                                                    <button title="buscar" class="btn btn-outline-primary text-black2"
                                                        type="submit">Buscar</button>

                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                  
                                </div>
                                {{-- end container --}}
                            </div>
                            @if ($clientes->count()))
                            <div class="card-body ">
                              
                               
                                
                               <div class="table-responsive">
                                    {{-- id="dataTable" --}}
                                    <table class="table  table-light mt-2" width="100%" cellspacing="0">
                                        <thead class="bg-color ">
                                            <tr class="text-blank text-center">
                                                <th scope="col">ID</th>
                                                <th scope="col">NOMBRE</th>
                                                <th scope="col">APELLIDO PATERNO</th>
                                                <th scope="col">APELLIDO MATERNO</th>
                                                <th scope="col">FECHA</th>
                                                <th scope="col">DIRECCION</th>
                                                <th scope="col">E-MAIL</th>
                                                <th scope="col">TELEFONO</th>
                                                <th scope="col" colspan="2">ACCIONES</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-black2">
                                            @forelse ($clientes as $cliente)
                                                <tr class="table-hover">
                                                    <th scope="row">{{ $cliente->id }}</th>

                                                    <td>
                                                        @can('productos.show')
                                                        <a class="text-center"
                                                            href="{{ route('clientes.show', [$cliente]) }}">

                                                            {{ $cliente->nombre }}
                                                        </a>
                                                        @endcan
                                                    </td>

                                                    <td class="text-center">{{ $cliente->apellido_p }}</td>
                                                    <td class="text-center">{{ $cliente->apellido_m }}</td>
                                                    <td class="text-center">{{ $cliente->fecha }}</td>
                                                    <td class="text-center"> {{ $cliente->direccion }}</td>
                                                    <td class="text-center"> {{ $cliente->correo}}</td>
                                                    <td class="text-center"> {{ $cliente->telefono }}</td>
                                                           

                                                    
                                                    <td>
                                                        {{-- @can('client.edit') --}}
                                                        <a title="editar datos" href="{{ route('clientes.edit',$cliente) }}"
                                                            class="btn btn-outline-primary btn-circle">
                                                            <i class="fa fa-edit"></i></a>
                                                        {{-- @endcan --}}
                                                    </td>
                                                    <td>
                                                        {{-- @can('productos.destroy') --}}
                                                        <form action="{{ route('clientes.destroy', [$cliente]) }}"
                                                            method="post">
                                                            @method("delete")
                                                            @csrf
                                                            <button title="borrar producto" type="submit" class="btn btn-outline-danger btn-circle btn-delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form> 
                                                        {{-- @endcan --}}
                                                    </td>
                                                </tr>
                                            @empty
                                            <h3 class="text-black text-center"> ¡No hay registros!</h3>
                                     @endforelse
                                        </tbody>
                                    </table>

                                    <nav aria-label="Page navigation example float-right">
                                        <a href="{{ route('clientes.index')}}" class="btn btn-outline-primary mx-3 mt-3 " >refrescar</a>
                                        <ul class="pagination float-right mt-3">
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $clientes->previousPageUrl() }}">Anterior</a></li>
                                            <li class="page-item"><a class="page-link" href="{{ $clientes->url(1) }}">1</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $clientes->url(2) }}">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ $clientes->url(3) }}">3</a>
                                            </li>
                                            <li class="page-item"><a class="page-link"
                                                    href="{{ $clientes->nextPageUrl() }}">Siguiente</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            @else
                            <div class="card-body ">
                               <div class=" row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('clientes.index')}}" class="btn btn-outline-primary" >regresar</a>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 mt-4">
                                    <div class="form-group">
                                        
                                            <strong class ="card-title">¡No hay registros!</strong>
                                       
                                    </div>
                                </div>
                            </div>
                               
                                
                                 </div>
                             @endif
                        
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
