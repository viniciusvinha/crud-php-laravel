<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud com Laravel</title>
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">{{-- nesta linha é onde chamamos o caminho da pasta do bootstrap para que ele possa interagir com o sistema --}}
</head>
{{--
    @yield - serve para exibir o conteúdo de uma determinada seção
    @section - serve para definir uma seção de conteúdo
--}}
<body>
    @yield('content') 

    <script src="{{url("assets/bootstrap/js/javascript.js")}}"></script>
</body>
</html>
