@extends('templates.template') {{-- aqui estou dizendo que é para ele chamar o template que esta dentro da pasta templates e tem nome de template --}}

@section('content')
    <h1 class="text-center">Crud</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{ url('books/create') }}"> {{-- aqui partindo da documentação do laravel, utilizamos o modo como é feito um método get e póstumo será feito um método post --}}
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>

    <div class="col-8 m-auto" >
        @csrf
        <table class="table text-center">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                {{-- teremos que fazer um loop de repetição para que seja exibido nos <tr> os dados --}}
                {{-- porém, para que consigamos exibir esses dados, temos que exibir isso no nosso método index no controller (BookController)  --}}
                <tbody>
                
                @foreach ($book as $books )
                @php
                    $user=$books->find($books->id)->relUsers;
                @endphp
                <tr>
                    <th scope="row">{{$books->id}}</th>
                    <td>{{$books->title}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$books->price}}</td>
                    <td>
                        <a href="{{url("books/$books->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>

                        <a href="{{url("books/$books->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <a href="{{url("books/$books->id")}}"class="js-del">
                            <button class="btn btn-danger">Deletar</button>
                        </a>
                    </td>
                </tr>
                @endforeach
                
                </tbody>
    </div>
@endsection