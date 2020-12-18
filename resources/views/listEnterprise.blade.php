@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

    <div class="header bg-primary">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                        <hr>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12 mb-3">
                <form method="POST" action="{{ route('enterprise.search') }}">
                    @csrf
                    <input placeholder="Buscar CNPJ da Empresa" id="search" name="search" type="text"
                        class="search form-control form-control-alternative">
                </form>
            </div>
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col">
                <div class="card">
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">Razão /nome Fantasia</th>
                                    <th scope="col" class="sort" data-sort="budget">CNPJ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="sort" data-sort="Cidade">Cidade</th>
                                    <th scope="col" class="sort" data-sort="status">UF</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($enterprises as $interprise)
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="{{ route('enterprise.edit', $interprise->id) }}"
                                                    class="avatar rounded-circle mr-3">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div
                                                                class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                                <span
                                                                    class="name mb-0 text-sm">{{ $interprise->name[0] }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{ $interprise->name }}</span>
                                                    <br>
                                                    <small><span
                                                            class="name mb-0 text-sm">{{ $interprise->razao_social }}</span></small>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{ $interprise->cnpj }}
                                        </td>
                                        <td>
                                            {{ $interprise->email }}
                                        </td>
                                        <td>
                                            {{ $interprise->cidade }}
                                        </td>
                                        <td>
                                            {{ $interprise->uf }}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('enterprise.details', $interprise->id) }}"><button class="btn btn-primary">Detalhes</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                </div>
            </div>
        </div>
    @endsection
