<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productcontroller extends Controller
{
    public function store(Request $request){ #create
        $request->validate([
            'producto' => 'required|min:5', #campos requeridos y un minimo de caracteres
            'modelo' => 'required|min:5',
            'color' => 'required|min:5',
            'proveedor' => 'required|min:5'
        ]);

            $product_env = new product;
            $product_env->producto = $request->producto;
            $product_env->modelo = $request->modelo;
            $product_env->color = $request->color;
            $product_env->proveedor = $request->proveedor;

            $product_env->save();

            return redirect()->route('products')->with('success', 'Producto Registrado');

    }

    public function index(){ #read
        $product_read = product::all();
        return view('products.index', ['product_read' => $product_read]);
    }

    public function show($id){ #show mostrar la tabla
        $product_read = product::find($id);
        return view('products.edit', ['product_read' => $product_read]);
    }    

    public function update(Request $request, $id){ #update actualizar la tabla
        $product_read = product::find($id);

        $product_read->producto = $request->producto;
        $product_read->modelo = $request->modelo;
        $product_read->color = $request->color;
        $product_read->proveedor = $request->proveedor;

        $product_read->save();

        return redirect()->route('products')->with('success', 'Producto Modificado Con Exito');
    }

    public function destroy($id){ #delete
        $product_read = product::find($id);
        $product_read->delete();
        return redirect()->route('products')->with('success', 'Producto Eliminado Con Exito');
    }
}
