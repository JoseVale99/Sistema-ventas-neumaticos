<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Cart;
use SebastianBergmann\LinesOfCode\Counter;

class VentasController extends Controller
{
    //

    public function index(Request $request){

        $buscar = $request->get('buscarpor');
        $tipo = $request->get('type');
        $variablesurl = $request->all();
        $sales = Venta::buscarpor($tipo,Str::upper($buscar))->paginate(5)->appends($variablesurl);
        return view('sales.index', compact('sales'));
    }

    public function create(){
        // ver clientes
        
        $nombres = Cliente::query()
        ->select(['nombre','apellido_p','apellido_m'])
        ->get();
       
        $data = [];
        $data_names = "";
        foreach ($nombres as $key => $names) {

            $data_names =$data_names.$names->nombre." ".$names->apellido_p." ".$names->apellido_m;
            $data [] = $data_names;
            $data_names = "";
        }
        
            
        return view('sales.add', compact('data'));
    }
    public function add(Request $request){

        $request->validate(
            [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u', // regex solo letras
                'impuesto' => 'required|numeric',
                'articulo' => 'required|regex:/^[\pL\s\-]+$/u',
                'cantidad' => 'required|numeric',
                'stock' => 'required|numeric',
                'descuento' => 'required|numeric',
                'pecio_venta' => 'required|numeric',
               
            ]
        );
        
        $data = 
        Cart::add(array(
            'id' => '122',
            'name' => $request->input('articulo'), // inique row ID
            'price' =>  $request->input('pecio_venta'),
            'quantity' =>  $request->input('cantidad'),
            'attributes' => array(
                'descuento' => $request->input('descuento')
            )
        )
        );

        $iva =Cart::getSubTotal() * ($request->get('impuesto')/100); 
        $impuesto = Cart::getSubTotal()+$iva;
        // dd($impuesto);

        
        Session::flash('message_save', "¡Producto agregado con éxito!");

        return redirect()->route('venta.crate')->with( ['iva' => $iva] );
    }
    public function removeitem(Request $request)
    {

        // $producto = Producto::where('id',$request->id)->firstOrFail();
        Cart::remove(
            [
                'id' => $request->id,
            ]
        );
        Session::flash('message_delete', "¡se ha borrado del carrito!");
        return back();
    }
    public function clear(Request $request)
    {
        Cart::clear();
        Session::flash('message_delete', " ¡se a borrado el carrito correctamente!");

        return back();
    }
    public function statusCart(){

    }
}
