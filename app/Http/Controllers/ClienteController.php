<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
class ClienteController extends Controller
{

    public function __construct(){
        $this->middleware('can:client.index')->only('index');
        $this->middleware('can:client.create')->only('create');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscarpor');
        $tipo = $request->get('type');
        $variablesurl = $request->all();
        $clientes = Cliente::buscarpor($tipo,Str::upper($buscar))->paginate(5)->appends($variablesurl);
        return view("clients.index", compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u', // regex solo letras
                'apellido_p' => 'required|regex:/^[\pL\s\-]+$/u',
                'apellido_m' => 'required|regex:/^[\pL\s\-]+$/u',
                'direccion' => 'required|regex:/[\pL\s\-"+0-9]+.$/u', // regex Solo: incluye algunos carcateres
                'correo' => 'required|email',
                'telefono' => 'required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/u',
               
            ]
        );
        Session::flash('message_save', '¡Cliente guardado con éxito!');

        $cliente = new Cliente($request->input());
        $cliente ->nombre =Str::upper($request->input('nombre'));
        $cliente ->apellido_p =Str::upper($request->input('apellido_p'));
        $cliente ->apellido_m =Str::upper($request->input('apellido_m'));
        $cliente ->direccion =Str::upper($request->input('direccion'));
        

        $cliente->saveOrFail();
        return redirect()->route("clientes.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        
        if($cliente->id == null){
          
            return view('errors.404');
        }

        return view('clients.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
       
        return view('clients.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate(
            [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u', // regex solo letras
                'apellido_p' => 'required|regex:/^[\pL\s\-]+$/u',
                'apellido_m' => 'required|regex:/^[\pL\s\-]+$/u',
                'direccion' => 'required|regex:/[\pL\s\-"+0-9]+.$/u', // regex Solo: incluye algunos carcateres
                'correo' => 'required|email',
                'telefono' => 'required|regex:/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/u',
               
            ]
        );
        Session::flash('message_save', '¡Cliente actualizado con éxito!');

        $cliente->fill($request->input());
        $cliente ->nombre =Str::upper($request->input('nombre'));
        $cliente ->apellido_p =Str::upper($request->input('apellido_p'));
        $cliente ->apellido_m =Str::upper($request->input('apellido_m'));
        $cliente ->direccion =Str::upper($request->input('direccion'));
        
        // $cliente->update($request->input());
        $cliente->save();
        
        return redirect()->route("clientes.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        Session::flash('message_delete', 'Cliente borrado con éxito!');
        $cliente->delete();
        return redirect()->route("clientes.index");
    }
}
