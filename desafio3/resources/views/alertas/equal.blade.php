@extends('layouts.default')
@section('conteudo')
<style>
section{
    display: flex;
    justify-content: center;
    align-items: center;
    height: calc(100vh - 72px) ;
}
section h3{
    text-align:center;
}
.box{
    height: 30vh;
    width: 50%;
    box-sizing:border-box;
    padding: 1%;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
.box div{
    padding: 1%;
    display: flex;
    justify-content: flex-end;
}    
</style>
<section>
    <div class='box'>
        <h3>{{$tipo}}</h3>
        <hr>
        <div>
            <a class='btn btn-danger' href="{{url($rota)}}">voltar</a>
        </div>
    </div>
</section>
@stop