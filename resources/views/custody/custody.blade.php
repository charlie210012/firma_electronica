<x-layouts.base>
<section>
    <div class="page-header section-height-75">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <h3 class="font-weight-bolder text-info text-gradient">{{ __('Hola') }} {{$user->name}}</h3>
                            @if (!isset($status))
                            <p class="mb-0">{{ __('Tienes un documento pendiente por firmar para ')}} {{$cliente->name}}<br></p>
                            @endif
                        </div>
                        @if (isset($status))
                            <div class="alert alert-success">
                                {{ 'El documento ha sido firmado exitosamente' }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Nombre del documento</th>
                                <th scope="col">link</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">{{$firma->name_document}}</th>
                                <td><a target="_black" href="{{url("/document/$firma->url")}}" class="list-group-item list-group-item-action">Ver documento</a></td>
                              </tr>
                            </tbody>
                          </table>
                        @if (!isset($status))
                        <div class="card-body col-xl-6">
                            <form  action="{{url('/sign')}}" method="POST" role="form text-left">
                                @csrf
                                <div class="mb-3">
                                    <label for="email">{{ __('Ingresar Codigo OTP') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input wire:model="email" id="otp" name="otp" type="text" class="form-control"
                                            placeholder="Codigo OTP" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <input id="user_id" name="user_id" type="hidden" value="{{$registro->user_id}}">
                                <input id="client_id" name="client_id" type="hidden" value="{{$registro->client_id}}">
                                <input id="firma_id" name="firma_id" type="hidden" value="{{$registro->firma_id}}">
                                <input id="token" name="token" type="hidden" value="{{$registro->tokenView}}">
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn bg-gradient-info w-100 mt-4 mb-0">{{ __('Firmar') }}</button>
                                </div>

                            </form>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                            style="background-image:url('../assets/img/Firma-digital.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</x-layouts.base>
