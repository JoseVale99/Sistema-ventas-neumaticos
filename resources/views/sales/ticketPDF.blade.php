<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Ticket</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-10 ">
                <h1>MICHELIN</h1>
               
            </div>
            
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-10">
                <h1 class="h6">André Michelin</h1>
               
            </div>
            <div class="col-xs-2 text-center">
              
               <strong>Fecha: </strong> {{ $ventas[0]->fecha }}
          
               
            </div>
        </div>
        <hr>
        <div class="row text-center" style="margin-bottom: 2rem;">
            <div class="col-xs-6">
                
            </div>
            <div class="col-xs-6">
                <h1 class="h2"> Ticket</h1>
               
                <strong>CLiente: </strong> {{ $ventas[0]->nombre }} 
               
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-condensed table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ARTICULO</th>
                            <th>CANTIDAD</th>
                            <th>DESCUENTO</th>
                            
                        </tr>
                    </thead>
                    <tbody><tfoot>
                        @foreach ($ventas as $venta)
                        <tr class="table-bordered">
                            
                        <td  class="text-center">{{ $venta->articulo }}</td>
                           <td  class="text-center">{{ $venta->cantidad }}</td>
                           <td class="text-right">{{ $venta->descuento }} %</td>
                            
                            
                           
                           
                            </tr>
                           
                            <tr>
                                <td colspan="2" class="text-right">
                                  <h5>Total impuesto (18%): </h5>
                              </td>   
                                <td  class="text-right">
                                  {{ number_format($venta->impuesto, 2, '.', '') }}
                              </td>
                          
                          </tr>
                          <tr>
                            <td colspan="2" class="text-right">
                              <h5>Total a pagar </h5>
                          </td>   
                            <td  class="text-right">
                             $ {{ number_format($venta->total_venta,2, '.', '') }} MXN
                          </td>
                      
                      </tr>
                           
                              

                            </tfoot>
                       
                       
                 @endforeach
                </tbody>
            
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <p class="h4">¡Gracias por su compra!</p>
            </div>
        </div>
    </div>
</body>

</html>