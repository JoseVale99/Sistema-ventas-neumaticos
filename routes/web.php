<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\PromocionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' =>'auth'], function(){

    // Rutas Dashboard admin
    Route::resource('productos', ProductosController::class);
    Route::resource('permission', PermissionController::class)->only(['index','edit','update','destroy']);
    Route::resource('role', RolesController::class);
    Route::resource('user', UserController::class)->only(['index','edit','update']);




// pedidos
    Route::get('/Pedidos/index',[PedidoController::class,'index'])->name('pedido.index')->middleware('can:pedido.index');
    Route::delete('/Pedidos/borrar/{id}',[PedidoController::class,'destroy'])->name('pedido.destroy')->middleware('can:pedido.destroy');

//  Reportes
    Route::get('/Reportes/index',[ReporteController::class,'index'])->name('reporte.index')->middleware('can:reporte.index');
    Route::get('/Reportes/pdf', [ReporteController::class, 'createPDF'])->name('reporte-pdf')->middleware('can:reporte-pdf');

// ::::::::::::::::: cliente ::::::::::::::::::::::::::::::::

// Rutas del carrito cliente
    Route::post('/Cart/cart_add', [CarritoController::class,'add'])->name('cart.add');
// Mostrar el carrito
    Route::get('/Cart/cart-checkout',[CarritoController::class,'cart'])->name('cart.checkout')->middleware('can:cart.checkout');
// Borrar todo el carrito
    Route::post('/Cart/cart-clear', [CarritoController::class,'clear'])->name('cart.clear');
// Renover un intem de carrito
    Route::post('/Cart/cart-removeitem', [CarritoController::class,'removeitem'])->name('cart.removeitem');

// Mueestra la vista principal del carrito
    Route::get('/Cart/Carrito', [CarritoController::class,'index'])->name('cart.cart')->middleware('can:cart.cart');

// Clientes CRUD--- -----

Route::resource('clientes', ClienteController::class);
// Crud de ventas

Route::get('/ventas/index', [VentasController::class,'index'])->name('venta.index');
Route::get('/ventas/index/create', [VentasController::class,'create'])->name('venta.create');
Route::post('/ventas/nuevaventa', [VentasController::class,'add'])->name('venta.add');
Route::post('/Ventas/eliminaritems', [VentasController::class,'removeitem'])->name('venta.removeitem');
Route::post('/Ventas/eliminaritem', [VentasController::class,'clear'])->name('venta.clear');
Route::post('/Ventas/pago-tiket', [VentasController::class, 'payCart'])->name('venta.payCart');
Route::get('/Ventas/detalleventa/{id}', [VentasController::class, 'detalle_venta'])->name('venta.detalle_venta');
Route::delete('/Ventas/remove/{id}', [VentasController::class, 'delete'])->name('venta.delete');
Route::get('/Ventas/download/ticket/{id}', [VentasController::class, 'ticket_download'])->name('venta.ticket');

// PROMOCIONES -API TELEGRAM
Route::get('/Promociones/index', [PromocionesController::class,'index'])->name('promocion.index');
Route::post('/Promociones/send_promotion', [PromocionesController::class,'toTelegram'])->name('promocion.send');
// Route::get('/updated-activity', [PromocionesController::class,'updatedActivity']);

// pagos con stripe


// compra
    Route::get('/stripe', [CarritoController::class, 'stripe'])->name('cart.stripe');
    Route::post('/stripe', [CarritoController::class, 'stripePost'])->name('stripe.post');
// Facturas
    Route::get('/Cart/invoice', [CarritoController::class, 'invoices'])->name('cart.invoices')->middleware('can:cart.invoices');
    Route::get('/Cart/invoice/{id}', [CarritoController::class, 'createPDF'])->name('factura-pdf');


// all users

    Route::get('/user/profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('/user/profile/{id}',[UserController::class,'show'])->name('user.show');
    Route::put('/user/profile/update/{id}',[UserController::class,'userUpdate'])->name('user.editar');

});




