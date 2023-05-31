<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInfo;
use DB;
use Auth;
use PhpParser\Node\Stmt\TryCatch;

class UserInfoController extends Controller
{
    /**
     * Método que roda ao criar a instância do controlador que é utilizado pelo Laravel.
     * Em outras palavras, esse método pode ser utilizado para configurar o controlador
     * de forma inicial
     */

    public function __construct()
    {
        // $this->middelware('auth.web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

        try {
            if (Auth::check()) {
                $logged = Auth::user();
                $userInfo = UserInfo::find($logged->id);
                if (isset($userInfo)) {
                    return view("UserInfo/show")->with("userInfo", $userInfo);
                } else {
                    return view("UserInfo/create");
                }
            } else {
                return redirect()->route('login');
            }
        } catch (\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
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
            if (Auth::check()) {
                $logged = Auth::user();
                $userInfo = new UserInfo();
                $userInfo->Users_id = $logged->id;
                // dados dentro do model = dados vindos da view
                $userInfo->profileImg = $request->profileImg;
                $userInfo->status = "A";
                $userInfo->dataNasc = $request->dataNasc;
                $userInfo->genero = $request->genero;
                $userInfo->save();
                return view("UserInfo/show")->with("userInfo", $userInfo)->with('message', ['Informações do usuário cadastradas com sucesso.', 'success']);
            } else {
                return redirect()->route('login');
            }
        } catch (\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
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
            if (Auth::check()) {
                $logged = Auth::user();
                $userInfo = UserInfo::find($logged->id);
                if (isset($userInfo)) {
                    if ($id == $logged->id) {
                        return view("UserInfo/show")->with("userInfo", $userInfo);
                    } else {
                        return view("UserInfo/show")->with("userInfo", $userInfo)->with('message', ['Não é possível acessar informações de outros usuários.', 'warning']);
                    }
                } else {
                    return view("UserInfo/create")->with("message", ["O usuário não possui informações adicionais cadastradas.", "warning"]);
                }
            } else {
                return redirect()->route('login');
            }
        } catch (\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
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
            if (Auth::check()) {
                $logged = Auth::user();
                // procuro e vejo se existe a informação do usuário logado
                $userInfo = UserInfo::find($logged->id);
                if (isset($userInfo)) {
                    if ($id == $logged->id) {
                        return view("UserInfo/edit")->with("userInfo", $userInfo);
                    } else {
                        return view("UserInfo/show")->with("userInfo", $userInfo)->with('message', ['Não é possível acessar informações de outros usuários.', 'warning']);
                    }
                } else {
                    return view("UserInfo/create")->with("message", ["O usuário não possui informações adicionais cadastradas.", "warning"]);
                }
            } else {
                return redirect()->route('login');
            }
        } catch (\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
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
        $userInfo = new UserInfo();
        try {
            if (Auth::check()) {
                $logged = Auth::user();
                $userInfo = UserInfo::find($id);
                if (isset($userInfo)) {
                    if ($id == $logged->id) {
                        $userInfo->profileImg = $request->profileImg;
                        $userInfo->dataNasc = $request->dataNasc;
                        $userInfo->genero = $request->genero;
                        $userInfo->update();
                        return view("UserInfo/show")->with("userInfo", $userInfo)->with('message', ['Informações atualizadas com sucesso.', 'success']);
                    } else {
                        return view("UserInfo/show")->with("userInfo", $userInfo)->with('message', ['Não é possível acessar informações de outros usuário.', 'warning']);
                    }
                } else {
                    return view("UserInfo/create")->with("message", ["O usuário não foi encontrado.", "warning"]);
                }
            } else {
                return redirect()->route('login');
            }
        } catch (\Throwable $th) {
            if ($userInfo->Users_id == null) {
                return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
            } else {
                return view("UserInfo/show")->with("userInfo", $userInfo)->with('message', [$th->getMessage(), 'danger']);
            }
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
            if (Auth::check()) {
                $logged = Auth::user();
                $userInfo = UserInfo::find($id);
                if (isset($userInfo)) {
                    if ($id == $logged->id) {
                        $userInfo->delete();
                        return view("UserInfo/create")->with('message', ['Informações do usuário removidas com sucesso.', 'success']);
                    } else {
                        return view("UserInfo/show")->with("userInfo", $userInfo)->with('message', ['Informações não pertencem ao usuário.', 'warning']);
                    }
                } else {
                    return view("UserInfo/show")->with("userInfo", $userInfo)->with("message", ["O usuário não foi encontrado.", "warning"]);
                }
            } else {
                return redirect()->route('login');
            }
        } catch (\Throwable $th) {
            return view("UserInfo/create")->with("message", [$th->getMessage(), "danger"]);
        }
    }
}
