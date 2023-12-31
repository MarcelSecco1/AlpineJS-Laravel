@extends('welcome')
@section('content')
    <h1>Usuários</h1>
    <button type="button" class="btn btn-dark mb-3 mt-3 text-white" x-data="{}" @click="$dispatch('modal-user')">
        Novo Usuário
    </button>
    <ul class="list-group">



        @foreach ($users as $user)
            <li class="list-group-item d-flex justify-content-between">
                {{ $user->name }}
                <div x-data="{}">
                    <button class="btn btn-primary" @click="$dispatch('modal-user', {{ $user }})">
                        Editar
                    </button>
                </div>

            </li>
        @endforeach
    </ul>
    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
