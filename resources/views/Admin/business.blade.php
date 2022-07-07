@extends('Admin.layouts.admin')

@section('content')
    {{-- @include('Admin.modals.accountOwn') --}}
    @include('Admin.modals.accountOther')
    {{-- @include('modals.registerOther') --}}

    <main class="main-content">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="numbers">
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Numero de Negocios activos</p>
                                        <h5 class="font-weight-bolder mb-0">
                                            {{$business->where('revoked',0)->count()}}  
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
                                        <p class="text-sm mb-0 text-capitalize font-weight-bold">Crear nuevo negocio</p>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#otherModal"
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
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-4 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0" id="clients">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                id del negocio
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nombre del negocio
                                            </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nombre del cliente</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Token</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Borrar Negocio</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($business->where('revoked',0) as $a)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $a->id }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $a->business_name}}</h6>
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
                                                            <h6 class="mb-0 text-sm">{{ $clients->find($a->client_id)->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> {{ $a->token }} </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"><button type="button" class="btn btn-warning" onclick="borrarBusiness({{$a->id}})">Borrar</button></span>
                                                </td>
                                                
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
