@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {!!Html::script('js/jquery.min.js')!!}

    <script>
        var valor;
        var contador = 0;
        $(document).ready(function(){
            $('#texto').hasData(function(){
                valor = $("#texto").val();

                $("#tags").val(valor);
            });
        });
    </script>
</head>
<body>

        <button class="btn btn-info form-group">Presione</button>

        {!!Form::select('text',["val"=>'valoe',"bg"=>"gfhf"],['id'=>'texto'])!!}

        <div class="ui-widget">
                <label for="tags">Tags: </label>
                <input id="tags">
              </div>



        <div class="container">


        </div>





</body>
</html>

@endsection
