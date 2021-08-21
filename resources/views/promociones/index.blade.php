@extends('layouts.main')
@section('titulo', 'Mi perfil')
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
                    <h1 class="h3 mb-2 bold-title">Promociones<i class="fas fa-percentage mx-3"></i></h1>
                    <p class="mb-4 text-dark"></p>

                    @include('plantilla.notification')
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold "> Enviar promociones</h6>
                        </div>

                      
                        {{-- Formulario -> vista de usuario --}}

                        <div class="container">
                            <div class="row">
                               
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-6 col-lg-10 col-md-8">
                                                <div class="card o-hidden border-login my-5">
                                                    <div class="card-body p-0">
                                                        <div class="container px-5 my-5">
                                                            <div class="row">
                                                                <div class="right-content">
                                                                    <div class="container">
                                                                        <form id="contact" action="{{ route('promocion.send')}}"  method="post" enctype="multipart/form-data">
                                                                            {{ csrf_field() }}
                                                                            @csrf
                                                                            <div class="row">
                                                                                <div class="col-md-12" style="text-align: center">
                                                                                    <label class="text-black h4">Promocion</label>
                                                                                    <br><br>
                                                                                </div>
                                                                                <div class="col-md-12 mt-4">
                                                                                    <div class="text-center">
                                                                                        <label class="text-black h4">Imagen</label>
                                                                                        <input type="file" accept="image/*" name="image"
                                                                                        placeholder="Inserte una imagen" class="form-control text-upper">

                                                                                    </div>
                                                                                    @error('image')
                                                                                    <div class="message-error">*{{ $message }}</div>
                                                                                @enderror
                                                                            
                                                                                </div>
                                                                               
                                                                            <div class="col-md-12 mt-4">
                                                                                    <div class="form-group">
                                                                                        <label class="text-black h4">Mensaje</label>
                                                                                        <textarea class="form-control" 
                                                                                        value="{{old('message')}}"    name="message"></textarea>
                                                                                    </div>
                                                                                    @error('message')
                                                                                    <div class="message-error">*{{ $message }}</div>
                                                                                @enderror
                                                                                
                                                                                </div>
                                            
                                                                                
                                                                                
                                                                                <div class="col-md-6" style="text-align: right">
                                                                                    <div><label class="text-black h4">Valor de descuento:</label></div>                                        
                                                                                </div>
                                                                                @php($porcentaje = ['10', '15', '20', '25', '30','35', '40', '45', '50'])
                                                                                <div class="col-md-6" style="text-align:right">
                                                                                    <select name="descuento" value="{{old('descuento')}}">
                                                                                        @foreach ($porcentaje as $p)
                                                                                        <option selected>{{$p}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6" style="text-align: right">
                                                                                    <div><label class="text-black h4">Rin:</label></div>                                        
                                                                                </div>
                                                                                @php($rines = ['13', '14', '15', '16', '17','18', '19', '20'
                                                                                ,"22"])
                                                                                <div class="col-md-6" style="text-align:right">
                                                                                    <select name="rin" value="{{old('rin')}}">
                                                                                        @foreach ($rines as $rins)
                                                                                        <option selected>{{$rins}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                               
                                                                           <br><br>
                                                                                <div class="text-black h4" style="text-align: center;">
                                                                                <button class="btn btn-primary btn-user btn-block" type="submit">Enviar promocion <i class="fas fa-paper-plane"></i> </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div> 
                            </div>

                        <br><br>

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
