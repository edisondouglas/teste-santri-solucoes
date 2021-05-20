<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de usuários
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-12">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('buscar') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-9 mt-1">
                                <input required type="text" class="form-control" id="name" name="name" placeholder="Nome" aria-label="Nome"
                                       aria-describedby="basic-addon1">
                            </div>
                            <div class="col-md-3 align-items-end mt-1">
                                <button type="submit" class="btn btn-danger">
                                    Buscar
                                </button>
                                @if($permitir_cadastrar)
                                <a type="button" href="/register" class="btn btn-success float-end">
                                    Adicionar Usuário
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Login</th>
                                <th scope="col">Ativo</th>
                                <th scope="col">Opções</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <td scope="row">{{$usuario->name}}</td>
                                    <td>{{$usuario->email}}</td>
                                    <td>@if($usuario->ativo=='S') Sim @else Não @endif</td>
                                    <td>@if($permitir_excluir)
                                            @if($usuario->ativo=='S')
                                            <a href="/delete/{{$usuario->id}}" class="btn btn-sm btn-danger">Desativar</a>
                                            @else
                                                <a href="/ativar/{{$usuario->id}}" class="btn btn-sm btn-success">Ativar</a>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
