@extends('templates.template') {{-- aqui estou dizendo que é para ele chamar o template que esta dentro da pasta templates e tem nome de template --}}

@section('content')
    <h1 class="text-center">Visualizar</h1> <hr>

    <div class="col-8 m-auto" >
        @php
            $user=$book->find($book->id)->relUsers;
        @endphp
{{-- Aqui nesta parte, temos o modo como chamaremos casa informação que será impressa na view ('show') --}}

        Título: {{$book->title}}<br>
        Páginas: {{$book->pages}}<br>
        Preço: R$ {{$book->price}}<br>
        Autor: {{ $user->name }} <br>
        E-mail do Autor: {{ $user->email }}<br>
    </div>
@endsection