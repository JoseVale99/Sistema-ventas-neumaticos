@extends('layouts.main')
@section('titulo', 'Nueva venta')
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
                    <h1 class="h3 mb-2 bold-title"> Nueva Venta <i class="fas fa-cart-arrow-down"></i> </h1>
                    <p class="mb-4 text-dark">Registre una nueva venta aquí.</p>


                    {{-- mensajes --}}
                    @include('plantilla.notification')

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4 rounded card-color">
                        <div class="card-header py-3 bg-color">
                            <h6 class="m-0 font-weight-bold ">Agregar venta</h6>
                        </div>

                        {{-- Formulario -> vista de productos --}}

                        
                        <div class="container">
                           
                            <form  action="{{ route('venta.add') }}" method="POST">

                                @csrf
                                <div class="row">

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Cliente</label>
                                     
                                        <select class="form-control" name="nombre" value="{{ old('nombre') }}">
                                                    <option value="" disabled selected>SELECCIONE UNA OPCIÓN</option>
                                                    @foreach ($data as $name)

                                                        @if (old('nombre') == $name)
                                                            <option selected="selected">{{ $name }}</option>
                                                        @else
                                                            <option>{{ $name }}</option>
                                                        @endif

                                                    @endforeach
                                                </select>
                                                @error('nombre')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                    </div>

                                </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Impuesto</label>
                                            <input type="text" name="impuesto" value="18"
                                             {{-- value="{{ old('impuesto') }}" --}}
                                                placeholder="impuesto"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('impuesto')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Articulo</label>
                                            <input type="text" name="articulo" value="{{ old('articulo') }}"
                                                placeholder="Articulo"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('articulo')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Cantidad</label>
                                            <input type="number" name="cantidad" value="{{ old('cantidad') }}"
                                               min="1" max="40" placeholder="Cantidad"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('cantidad')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-2 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Stock</label>
                                            <input type="number" name="stock"  value="30"
                                            {{-- value="{{ old('stock') }}" --}}
                                               min="1" max="40" placeholder="Stock"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('stock')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-2 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Descuento</label>
                                            <input type="number" name="descuento" value="0"
                                            {{-- value="{{ old('descuento') }}" --}}
                                               min="0" max="40" placeholder="descuento"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('descuento')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
   

                                    <div class="col-md-4 mt-4">
                                        <div class="form-group">
                                            <label class="text-black h4">Precio venta</label>
                                            <input type="text" name="pecio_venta" value="{{ old('pecio_venta') }}"
                                               min="1" max="40" placeholder="Precio de venta"
                                                class="form-control text-upper">
                                            {{-- validaciones --}}
                                            @error('pecio_venta')
                                                <div class="message-error">*{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                        </div>

                                        {{-- PARTE BOTONES --}}
                                        
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-md-6">
                                                <button title="guardar datos" type="submit" class="btn btn-primary btn-lg btn-block">
                                                    agregar <i class="fas fa-plus-circle"></i></button>
                                            </div>
                                            
                                          
                                       
                                        </div>
                                        <br>

                                    </form>
                                    
                                </div>
                                @if (count(Cart::getContent()))
                           

                                <div class="card-body ">
                                    <div class="table-responsive">
                                        {{-- id="dataTable" --}}
                                        <table class="table  table-light" width="100%" cellspacing="0">
                                            <thead class="bg-color ">
                                                <tr class="text-blank text-center">
                                                    {{-- <th scope="col">NO</th> --}}
                                                    <th scope="col">NO</th>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">PRODUCTO</th>
                                                    <th scope="col">PRECIO</th>
                                                    <th scope="col">CANTIDAD</th>
                                                    <th scope="col">DESCUENTO</th>
                                                    <th scope="col">SUBTOTAL</th>
                                                    <th scope="col">ACCIÓN</th>
                                                    
                                                    {{-- <th scope="col">CANTIDAD</th> --}}
                                                    {{-- <th scope="col">ELIMINAR</th> --}}
                                                </tr>
                                            </thead>
                                            
                                            {{-- {{Cart::getContent()}} --}}
                                            <tbody class="text-black2">
                                               
                                        
                                                    
                                                <?php
                                                {{  $i = 1;}} //contador para el listado de objetos en el carrito
                                            ?>

                                               @foreach (Cart::getContent() as $item)
                                

                                                
                                               <tr class="table-hover">
                                                <td class="text-center">{{ $i }}</td>
                                               
                                                <td class="text-center">{{ $item->id }}</td>
                                                <td class="text-center">{{ $item->name }}</td>
                                                <td class="text-center">$ {{ number_format($item->price, 2, '.', '') }}</td>
                                                <td class="text-center">{{ $item->quantity}}</td>
                                                <td class="text-center">{{ $item->attributes->descuento}} %</td>
                                                <td class="text-center">$ {{  number_format(Cart::get($item->id)->getPriceSum(),2, '.', '')}}</td>
                                                
                                                <td class="text-center">
                                                    <form action="{{ route('venta.removeitem')}}"
                                                    method="POST">
                                                    @csrf 
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <button title="eliminar producto" type="submit" class="btn btn-outline-danger btn-circle">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                </td>
                                                   
                                                   }
                                            </tr>

                                            <?php

                                                $i++;
                                                ?>
                                              
                                               
                                               
                                               <td></td>

                                                
                                   
                                               @endforeach   
                                    <tr>
                                        <form action="{{ route('venta.clear') }}" method="POST">
                                            @csrf
                                            <td class="text-center">
                                              <input title="limpiar todo el carrito" 
                                              class="btn btn-outline-danger btn-lg btn-block" type="submit" name="Limpiar" value="limpiar Carrito">
                                      </form>
                                      
                                        <td colspan="5" class="text-right">
                                          <h6>TOTAL</h6>
                                      </td>   
                                        <td  class="text-right">
                                         
                                            {{ number_format(Cart::getTotal(), 2, '.', '') }} MXN
                                           
                                      </td>
                                  
                                  </tr>
                                  <tr>
                              
                                    <td colspan="6" class="text-right">
                                      <h6>TOTAL IMPUESTO (18%): </h6>                                               </h5>
                                  </td>   
                                    <td  class="text-right">
                                        {{ number_format($item->attributes->iva, 2, '.', '') }} 
                                            
                                        
                                  </td>
                              
                              </tr>
                              <tr>
                              25.1814
                                <td colspan="6" class="text-right">
                                  <h6>TOTAL A PAGAR: </h6>                                               </h5>
                              </td>   
                                <td  class="text-right">
                                   {{$item->attributes->total_pay}}
                                        
                                    
                              </td>
                          
                          </tr>   
                                
                                            </tbody>
                                            
                                        </table>
                                        @if (count(Cart::getContent())!=0)
                                       
                                        <form action="{{ route('venta.payCart')}}" method="POST">
                                            @csrf
                                            <button title="realizar compra" class="btn btn-outline-info btn-lg btn-block ">
                                                 Realizar compra <i class="fas fa-cart-arrow-down"></i>
                                            </button>
                                        </form>
                                         @endif
                                       
   
                                    </div>
                            </div>
                        
                            @else
                            <div class="card-body ">
                               <div class=" row">
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('venta.index')}}" class="btn btn-outline-primary" >regresar</a>
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
