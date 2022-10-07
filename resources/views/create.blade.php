@extends('templates.template')

@section('content')
    <h1 class="text-center">@if(isset($book))Editar @else Cadastrar @endif</h1> <hr>

    <div class="col-8 m-auto">

            @if (isset($errors) && count($errors)>0) {{-- Condição feita no caso de aparecer algum erro --}}
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach ($errors->all() as $erro)
                    {{ $erro }}<br>
                @endforeach
            </div>

            @endif

        @if(isset($book))
            {{-- Define o nosso cabeçalho para edição de dados --}}
            <form name="formEdit" id="formEdit" method="post" action="{{ url("books/$book->id")}}">
                @method('PUT')
        @else
            {{-- formulário para inserção dos dados de criação --}}
            {{-- name: o nome do nosso formulário / id:o id do nosso formulário / method: o que queremos que esse formulário faça / action: seria o caminho que vai retornar --}}
            <form name="formCad" id="formCad" method="post" action="{{ url('books') }}">
        @endif

            @csrf {{-- fornece uma maior segurança, pois ele gera um token para cada requisição --}}
            <input class="form-control mt-3 mb-4" type="text" name="title" id="title" placeholder="Título:" value="{{ $book->title ?? '' }}" required="required">
            <select class="form-control" name="id_user" id="id_user" required="required">
                <option value="{{ $book->relUsers->id ?? ''}}">{{ $book->relUsers->name ?? 'Autor'}}</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <input class="form-control mt-3 mb-4" type="text" name="pages" id="pages" placeholder="Páginas:" value="{{ $book->pages ?? '' }}" required="required">
            <input class="form-control mt-3 mb-4" type="text" name="price" id="price" placeholder="Preço:" value="{{ $book->price ?? '' }}" required="required">
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="@if(isset($book)) Editar @else Cadastrar @endif">
            </div>            
        </form>
    </div>
@endsection