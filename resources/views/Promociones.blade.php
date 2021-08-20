@extends('layouts.main')
@section('titulo', 'Promociones')
@section('contenido')

@include('layouts.nav-log')


<div class="bg-color">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-10 col-md-8">
                <div class="card o-hidden border-login my-5">
                    <div class="card-body p-0">
                        <div class="container px-5 my-5">
                            <div class="row">
                                <div class="right-content">
                                    <div class="container">
                                        <form id="contact" action="" method="post">
                                            <div class="row">
                                                <div class="col-md-12" style="text-align: center">
                                                    <label class="text-black h4">Promocion</label>
                                                    <br><br>
                                                </div>
                                                <div class="col-md-6" style="text-align: center">
                                                    <div><label class="text-black h4">Valor de descuento:</label></div>                                        
                                                </div>
                                                <div class="col-md-6" style="text-align:right">
                                                    <select name="ValorDescuento">
                                                        <option value="10">10%</option>
                                                        <option value="20">15%</option>
                                                        <option value="30">20%</option>
                                                        <option value="40">25%</option>
                                                        <option value="50">30%</option>
                                                        <option value="60">35%</option>
                                                        <option value="70">40%</option>
                                                        <option value="80">45%</option>
                                                        <option value="90">50%</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6" style="text-align: left">
                                                    <div><label class="text-black h4">Rin:</label></div>                                        
                                                </div>
                                                <div class="col-md-6" style="text-align:right">
                                                    <select name="ValorDescuento">
                                                        <option value="10">13°</option>
                                                        <option value="20">14°</option>
                                                        <option value="30">15°</option>
                                                        <option value="40">16°</option>
                                                        <option value="50">17°</option>
                                                        <option value="60">18°</option>
                                                        <option value="70">19°</option>
                                                        <option value="80">20°</option>
                                                        <option value="90">22°</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-none" id="submitErrorMessage">
                                                    <div class="text-center text-danger mb-3">Error sending message!</div>
                                                </div>
                                            <div class="text-black h4" style="text-align: center;">
                                                <button class="btn btn-primary btn-user" type="submit">Enviar promocion</button>
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
        </div>
    </div>
    <br><br><br><br>
</div>
 <!-- Footer -->
 @include('plantilla.footer')
 <!-- End of Footer -->
@endsection
