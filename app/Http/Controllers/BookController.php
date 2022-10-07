<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\ModelBook;
use App\Models\User;

class BookController extends Controller
{
    private $objUser; // atributo - se trata do objeto da nossa model
    private $objBook; // atributo - se trata do objeto da nossa model

    /**
     * Aqui já temos os dois objetos que iremos trabalhar no banco de dados, que estão vindo da model
     */
    public function __construct()
    {
        $this->objUser=new User();
        $this->objBook=new ModelBook();
    }
    /**
     * Aqui é o primeiro método a ser instanciado
     * O que colocarmos aqui, é o que sera exibido para o usuário quando ele digitar a rota "/"
     * dd($this->objBook->find(2)->relUsers); //dd - significa um vardump + die - 
     * ou seja, a ideia dele é logar a variável com um visual melhor, ao contrário do echo que só imprimi um texto. 
     * E após logar a variável, parar a execução do código PHP, ou seja, os códigos abaixo do dd não serão executados.
     */
    public function index()
    {
        $book=$this->objBook->all(); //criamos uma variavel book, que vai receber um objeto e chamo o método all para pegar todos os livros. 
        return view('index', compact('book'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all(); //isto aqui é para a coluna de usuários na parte dos formulários
        return view('create', compact('users')); //aqui é onde retornamos a nossa view, e estamos chamando todos os usuários
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request) //essa variável request vai receber todos os dados vindo do post
    {
        $cad=$this->objBook->create([
            'title'=>$request->title,
            'pages'=>$request->pages,
            'price'=>$request->price,
            'id_user'=>$request->id_user
        ]);
        if($cad){ // se a variável $cad for verdadeira, então retornaremos um redirecionamento para a página de books
            return redirect('books');
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
        $book=$this->objBook->find($id);
        return view('show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) //método de edição
    {
        $book=$this->objBook->find($id);
        $users=$this->objUser->all();
        return view ('create', compact ('book', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        $this->objBook->where(['id' =>$id])->update([
            'title'=>$request->title,
            'pages'=>$request->pages,
            'price'=>$request->price,
            'id_user'=>$request->id_user
        ]);
        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) //método que faz os deletes dos nossos dados
    {
        $del=$this->objBook->destroy($id);
        return($del)?"sim":"não";
    }
}
