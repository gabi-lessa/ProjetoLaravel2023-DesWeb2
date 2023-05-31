<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TipoProduto;
use DB;
use PhpParser\Node\Stmt\TryCatch;

class ProdutoController extends Controller
{
    /**
     * Método que roda ao criar a instância do controlador que é utilizado pelo Laravel.
     * Em outras palavras, esse método pode ser utilizado para configurar o controlador
     * de forma inicial
     */    

     public function __construct()
     {
         $this->middleware('auth:admin');
     }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // É o mesmo que "SELECT * FROM Produtos"
            $produtos = DB::select("SELECT Produtos.id, Produtos.nome, Produtos.preco, Tipo_Produtos.descricao FROM Produtos JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id ORDER BY Produtos.id;");
            // $produtos = DB::select('select * from Produtos');
            return view("Produto/index")->with("produtos", $produtos);
        } catch (\Throwable $th) {
            return view("Produto/index")->with("produtos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }

    // O método que recebe uma mensagem e imprime ela na view index
    public function indexMessage($message)
    {
        try {
            // É o mesmo que "SELECT * FROM Produtos"
            $produtos = DB::select("SELECT Produtos.id, Produtos.nome, Produtos.preco, Tipo_Produtos.descricao FROM Produtos JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id ORDER BY Produtos.id;");
            // $produtos = DB::select('select * from Produtos');
            return view("Produto/index")->with("produtos", $produtos)->with("message", $message);
        } catch (\Throwable $th) {
            return view("Produto/index")->with("produtos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $tipoProdutos = DB::select("SELECT * FROM Tipo_Produtos");
            return view("Produto/create")->with("tipoProdutos", $tipoProdutos);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            /// Crio um objeto da classe model (lembrar de dar "use")
            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->ingredientes = $request->ingredientes;
            $produto->urlImage = $request->urlImage;
            $produto->save();
            // Mando rodar o método index que cria de novo a view index
            return $this->indexMessage(["Produto cadastrado com sucesso", "success"]);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $produto = DB::select("SELECT Produtos.*, Tipo_Produtos.descricao FROM Produtos JOIN Tipo_Produtos ON Produtos.Tipo_Produtos_id = Tipo_Produtos.id WHERE Produtos.id = ?;", [$id]);
            // O Resultado do DB::select é sempre um array
            // Nesse caso o resultado é [] ou [obj]
            // dd($produto);
            if (count($produto) == 0) {
                return $this->indexMessage(["Produto não encontrado", "warning"]);
                // dd($produto);
            } else {
                return view("Produto/show")->with("produto", $produto[0]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $produto = Produto::find($id);
            $tipoProdutos = TipoProduto::all();
            if (isset($produto)) {
                // Mando carregar a view edit, criando dentro dela a variável $produto
                return view("Produto/edit")->with("produto", $produto)->with("tipoProdutos", $tipoProdutos);
            } else {
                return $this->indexMessage(["Produto não encontrado", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $produto = Produto::find($id);
            if (isset($produto)) {
                $produto->nome = $request->nome;
                $produto->preco = $request->preco;
                $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
                $produto->ingredientes = $request->ingredientes;
                $produto->urlImage = $request->urlImage;
                $produto->update();
                return $this->indexMessage(["Produto atualizado com sucesso.", "success"]);
            } else {
                return $this->indexMessage(["Produto não encontrado.", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $produto = Produto::find($id);
            if (isset($produto)) {
                $produto->delete();
                return $this->indexMessage(["Produto removido com sucesso.", "success"]);
            } else {
                return $this->indexMessage(["Produto não encontrado.", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }
}