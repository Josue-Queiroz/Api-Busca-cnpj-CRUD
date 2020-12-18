@extends('layouts.app', ['title' => __('Enterprise List')])

@section('content')
    @include('users.partials.header', [
    'title' => __('Empresas'),
    'description' => __('Desabilitadas dos buscadores'),
    'class' => 'col-lg-12'
    ])

    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Enterprises</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-list"></i></a></li>
                                <li class="breadcrumb-item">List | disabled</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <a href="{{ route('enterprise.add') }}" class="btn-lg btn btn-sm btn-neutral">Adicionar Empresa</a>
                        <a href="{{ route('enterprise.list') }}" class="btn-lg btn btn-sm btn-success">Empresas visiveis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
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
                                                    <small><span class="name mb-0 text-sm">{{ $interprise->razao_social }}</span></small>
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
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('enterprise.restore.list', $interprise->id) }}">Restaurar cadastro</a>
                                                    <a class="dropdown-item" onclick="return confirm('Essa empresa sera excluida de nossos registros, deseja continuar?')" href="{{ route('enterprise.desabled.definitive',  $interprise->id)}}">Excluir definitivamente</a>
                                                </div>
                                            </div>
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
        @include('layouts.footers.auth')
    </div>
@endsection
