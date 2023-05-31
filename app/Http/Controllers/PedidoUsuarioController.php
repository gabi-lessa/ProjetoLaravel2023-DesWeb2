<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\PedidoUsuario;
use DB;
use Auth;

class PedidoUsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('PedidoUsuario/index');
    }

    /**
     * Retorna os produtos de um TipoProdutoId informado
     * 
     * @return \Illuminate\Http\Response
     */

    public function getProdutos($id){
        // Se o ID informado for igual a 0, significa que quer todos os produtos
        if ($id == 0) {
            $produtos = DB::select("SELECT * FROM Produtos");
        // Se não, significa que quer um produto de um tipo específico
        } else {
            $produtos = DB::select("SELECT * FROM Produtos WHERE Produtos.Tipo_Produtos_id = ?", [$id]);
        }
        // Construção da resposta (criação do array $response)
        $response["message"] = "Consulta realizada com sucesso";
        $response["success"] = true;
        // response.return = array
        $response["return"] = $produtos;

        return response()->json($response, 201);
    }
}
