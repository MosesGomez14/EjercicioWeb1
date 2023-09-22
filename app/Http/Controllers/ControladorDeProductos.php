<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ControladorDeProductos extends Controller
{
    /** Funcionamiento 
     * Mostrar= muestra los productos
     * Crear= crea un producto
     * Actualizar= actualiza un producto
     * Eliminar= elimina el producto
     * Editar= muestra la edición
     */

     public function Crear(Request $request){

        $request->validate([
            'nombre'=> 'required',
            'precio'=> 'required'
        ]);
        
        $producto=new Producto;
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->iva=$request->precio*.16;
        $producto->preciomasiva=$request->precio*1.16;
        $producto->save();
        
        return redirect()->route('productos')->with('Completo','Creaste un producto con exito');
     }


     public function index(){
        $productos=Producto::all();
        return view('productos.index',['productos'=>$productos]);
     }

     public function Mostrar($id){
        $producto=Producto::find($id);
        return view('productos.mostrar',['producto'=>$producto]);
     }

     public function Actualizar(Request $request,$id){
        $producto=Producto::find($id);
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->iva=$request->precio*.16;
        $producto->preciomasiva=$request->precio*1.16;
        $producto->save();
        return redirect()->route('productos')->with('Completo','Producto actualizado correctamente');
     }

     public function Eliminar($id){
        $producto=Producto::find($id);
        $producto->delete();

        return redirect()->route('productos')->with('Completo','El producto se elimino correctamente');
     }

}
