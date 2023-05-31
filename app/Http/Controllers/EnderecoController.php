<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;
use DB;
use Auth;

class EnderecoController extends Controller
{
    /**
     * Método que roda ao criar a instância do controlador que é utilizado pelo Laravel.
     * Em outras palavras, esse método pode ser utilizado para configurar o controlador
     * de forma inicial
     */

    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $logged = Auth::user();
            $enderecos = DB::select('SELECT * FROM Enderecos WHERE Users_id = ?', [$logged->id]);
            return view("Endereco/index")->with("enderecos", $enderecos);
        } catch (\Throwable $th) {
            return view("Endereco/index")->with("enderecos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }

    public function indexMessage($message)
    {
        try {
            $logged = Auth::user();
            $enderecos = DB::select("SELECT * FROM Enderecos WHERE Users_id = ?", [$logged->id]);
            return view("Endereco/index")->with("enderecos", $enderecos)->with("message", $message);
        } catch (\Throwable $th) {
            return view("Endereco/index")->with("enderecos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("endereco/create");
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
            $logged = Auth::user();
            $endereco = new Endereco();
            $endereco->Users_id = $logged->id;
            $endereco->bairro = $request->bairro;
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->save();
            return $this->indexMessage(["Endereço cadastrado com sucesso.", "success"]);
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
            $endereco = Endereco::find($id);
            $logged = Auth::user();
            if (isset($endereco)) {
                if ($endereco->Users_id == $logged->id) {
                    return view("endereco/show")->with("endereco", $endereco);
                } else {
                    return $this->indexMessage(["Endereço não pertencente ao usuário!", "danger"]);
                }
            } else {
                return $this->indexMessage(["Endereço não encontrado.", "warning"]);
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
            $logged = Auth::user(); // Pego o usuárioque está logado
            $endereco = Endereco::find($id); // Encontro o endereço informado pela rota
            // Se o endereço existir
            if (isset($endereco)) {
                // Se o Users id do Endereço for igual ao id do usuário logado, então é possível fazer a alteração
                if ($endereco->Users_id == $logged->id) {
                    return view("endereco/edit")->with("endereco", $endereco);
                } else {
                    return $this->indexMessage(["Endereço não pertencente ao usuário!", "danger"]);
                }
            } else {
                return $this->indexMessage(["Endereço não encontrado.", "warning"]);
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
            $logged = Auth::user();
            $endereco = Endereco::find($id);
            if (isset($endereco)) {
                if ($endereco->Users_id == $logged->id) {
                    $endereco->bairro = $request->bairro;
                    $endereco->logradouro = $request->logradouro;
                    $endereco->numero = $request->numero;
                    $endereco->complemento = $request->complemento;
                    $endereco->update();
                    return $this->indexMessage(["Endereço atualizado com sucesso.", 'success']);                    
                } else {
                    return $this->indexMessage(["Endereço não pertencente ao usuário!", "danger"]);
                }
            } else {
                return $this->indexMessage(["Endereço não encontrado.", 'warning']);
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
            $logged = Auth::user();
            $endereco = Endereco::find($id);
            if (isset($endereco)) {
                if ($endereco->Users_id == $logged->id) {
                    $endereco->delete();
                    return $this->indexMessage(["Endereço removido com sucesso.", 'success']);                    
                } else {
                    return $this->indexMessage(["Endereço não pertencente ao usuário!", "danger"]);
                }
            } else {
                return $this->indexMessage(["Endereço não encontrado.", 'warning']);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }
}
