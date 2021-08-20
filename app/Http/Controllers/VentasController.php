<?php

namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Cart;
use DB;
use PDF;

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

    public function create(Request $request){
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
        
        
        Cart::add(array(
            'id' => $request->input('cantidad'),
            'name' => $request->input('articulo'), // inique row ID
            'price' =>  number_format($request->input('pecio_venta'),2,'.', ''),
            'quantity' =>  $request->input('cantidad'),
            'attributes' => array(
                'descuento' => $request->input('descuento'),
                'impuesto' => '',
                'iva' => '',
                'total_pay' =>''
                
            )
        )
        );

        

        $iva =Cart::getSubTotal() * 
        ($request->get('impuesto')/100);  
        $impuesto = Cart::getSubTotal()+$iva;
        
        $total_pay = round($impuesto-$impuesto * (($request->get('descuento')/100)),2);
        Cart::update($request->input('cantidad'), array(
            'attributes' => array(
                'descuento' => $request->input('descuento'),
                'impuesto' => $impuesto,
                'iva' => $iva,
                'total_pay' =>$total_pay,
                'cliente' => $request->input('nombre'),
        )));
        

        Session::flash('message_save', "¡Producto agregado con éxito!");

        return redirect()->route('venta.create');
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
    public function payCart(Request $request){
       
        // comprobar cliente
        $data = Cliente::query()    
            ->select("id",
            DB::raw("CONCAT(nombre, ' ',apellido_p, ' ', apellido_m) as nombre_completo")
            
        )   
        ->get();
       
      
        foreach (Cart::getContent() as $item) {
            
            $venta = new Venta();
            foreach ($data as $key => $cliente) {
                if($cliente->nombre_completo ==$item->attributes->cliente ){
                    $venta->id_cliente=$cliente->id;
                } 
                }
      
           $venta->nombre = $item->attributes->cliente;
           $venta->articulo = $item->name;
           $venta->cantidad = $item->quantity;
           $venta->impuesto = $item->attributes->iva;
           $venta->descuento = $item->attributes->descuento; 
           $venta->total_venta = $item->attributes->total_pay; 
           
               
        }
        $venta->saveOrFail();
        Cart::clear();
        Session::flash('message_save', "¡La compra se realizo con éxito!");
        
        return redirect()->route('venta.index');

    }
    public function detalle_venta($id){

        $ventas = Venta::findOrFail($id);
        // dd($ventas);

        return view('sales.detalle_sales',compact('ventas'));
    }

    public function delete($id){
        Session::flash('message_delete', '¡Producto cancelado con éxito!');
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route("venta.index");
    }
    public function ticket_download($id){

        $ventas = DB::table('ventas')->where('id', '=',$id)
        ->where('id', "=",$id)   
        ->get();
       
        // share data to view
         view()->share('sales.ticketPDF', $ventas);
        $pdf = PDF::loadView('sales.ticketPDF',compact('ventas'))
        ->setPaper('a4', 'landscape')->setWarnings(false);
        // $pdf- render();

    // download PDF file with download method
    return $pdf->stream("ticket.pdf",array('Attachment'=>false));
    }
}
