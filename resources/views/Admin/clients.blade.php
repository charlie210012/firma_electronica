@extends('Admin.layouts.admin')

@section('content')
    @include('Admin.modals.accountOwn')
    {{-- @include('modals.accountOther')
    @include('modals.registerOther') --}}

    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Documentos Firmados</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            10
                                        </h5>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Bienvenido,
                                            {{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Crear Nuevo cliente</p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#ownModal"
                                        class="btn btn-success">Crear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Cuentas de Terceros</p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#otherModal"
                                        class="btn btn-warning">Transferir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-6">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Inscribir Cuenta de
                                            Terceros</p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#registerOtherModal"
                                        class="btn btn-dark">Inscribir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="row my-4">
                <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Clientes</h6>
                                    {{-- <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span
                                            class="font-weight-bold ms-1">{{ Auth::user()->accounts->where('status', 'Activa')->count() }}
                                            cuentas</span> Activas
                                    </p> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="clients">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                id del cliente
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                nombre del cliente</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Secret</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                url de retorno</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Borrar Cliente</th>
                                            {{-- <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Estado
                                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($clients->where('revoked',0) as $client)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $client->id }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $client->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="../storage/img/finance.svg"
                                                                class="avatar avatar-sm me-3">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $client->secret }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <div class="avatar-group mt-2">
                                                        @foreach($account->transactionsAdd as $a)
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="{{$a->user->name}}">
                                                            <img alt="Image placeholder" src="../storage/img/team-2.jpg">
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                </td> --}}
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> {{ $client->redirect }} </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"><button type="button" class="btn btn-warning" onclick="borrar({{$client->id}})">Borrar</button></span>
                                                </td>
                                                {{-- <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold">
                                                        {{ number_format(Auth::user()->consolidateds->find($account->id)->value, '2', ',', '.') }}
                                                    </span>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">60%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-60" role="progressbar"
                                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <a type="button" href="{{ route('status') }}"
                                                                class="btn btn-info">Ver reporte</a>
                                                        </div>
                                                    </div>

                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Ultimas 6 Transacciones</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">{{ date('F') }}</span> {{ now() }}
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                @foreach ($transferencias as $transferencia)
                                    @if ($transferencia['Tipo_transaccion'] == 'Te transfirió')
                                        <div class="timeline-block mb-3">
                                            <span class="timeline-step">
                                                <i class="ni ni-bell-55 text-success text-gradient"></i>
                                            </span>
                                            <div class="timeline-content">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                    $ {{ $transferencia['valor'] }},
                                                    {{ $transferencia['Tipo_transaccion'] . ' ' . $transferencia['usuario_origen'] }}
                                                </h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                    {{ $transferencia['fecha'] }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="timeline-block mb-3">
                                            <span class="timeline-step">
                                                <i class="ni ni-money-coins text-dark text-gradient"></i>
                                            </span>
                                            <div class="timeline-content">
                                                <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                    $ {{ $transferencia['valor'] }},
                                                    {{ $transferencia['Tipo_transaccion'] . ' ' . $transferencia['usuario_destino'] }}
                                                </h6>
                                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                    {{ $transferencia['fecha'] }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </main>
    <main>
        <div class="container-fluid">
            <div class="row">
                @include('Admin.footers.admin')
            </div>
        </div>
    </main>
@endsection
