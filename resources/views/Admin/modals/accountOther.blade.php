<!-- Modal -->
<div class="modal fade" id="otherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titulomodal">Crear negocio</h5>
            </div>
            
            <div class="modal-body">

                <div class="tile">
                    <div class="tile-body">
                    
                        <form id="addBusiness" name="addBusiness" method="POST">
            
                            <div class="form-group">
                                <div class="alert alert-dark" role="alert">
                                    <p class="text-white text-center" >Los campos con (*) son obligatorios</p>
                                </div>
                                <label class="control-label">Nombre del cliente*</label>
                                <select class="form-control"  id="client_id" name="client_id" placeholder="Seleccione la cuenta" 
                                    required>
                                    <option value="0">Seleccione el cliente</option>
                                    @foreach ($clients->where('revoked',0) as $client)
                                        <option value="{{ $client->id }}"> {{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="alert alert-dark" id="otheroriginAlert" name="otheroriginAlert"  role="alert" style="display:none">
                                
                                <p class="text-white text-center" >Debes seleccionar el cliente</p>
                            </div>
                            {{-- <div class="form-group">
                                <label class="control-label">Cuenta destino de tercero*</label>
                                <select class="form-control" id="account_final" name="account_final" placeholder="Seleccione la cuenta destino"
                                    required>
                                    <option value="0">Seleccione la cuenta destino</option>
                                    @foreach (Auth::user()->otherAccounts as $account)
                                        <option value="{{ $account->account->id }}"> {{ $account->account->number }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            <div class="alert alert-dark" id="otherfinalAlert1" name="otherfinalAlert1"  role="alert" style="display:none">
                                
                                <p class="text-white text-center" >La cuenta de origen no puede ser igual la cuenta destino</p>
                            </div>
                            <div class="alert alert-dark" id="otherfinalAlert2" name="otherfinalAlert2"  role="alert" style="display:none">
                                
                                <p class="text-white text-center" >Debes seleccionar una cuenta destino</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nombre del negocio *</label>
                                <input class="form-control" id="business_name" name="business_name" type="text"
                                    placeholder="Ingresa el nombre del cliente" required>
                            </div>
                            <div class="alert alert-dark" id="othervalueAlert" name="othervalueAlert"  role="alert" style="display:none">
                                <p class="text-white text-center" >El valor a transferir no puede ser igual a cero</p>
                            </div>
                            
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit"  class="btn btn-info" id="btnTransfer" name="btnTransfer"><span id="btntext"
                                        class="bg-light"></span>Crear</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    
    const form2 = document.getElementById('otherTransfer');
    const otherInputs = document.querySelectorAll("#otherTransfer input");

    const otherSelects = document.querySelectorAll("#otherTransfer select")

    var sel;
    var fel;
   
    const validarFormularioOther = (e) =>{
        switch (e.target.name){
            case "account_origin":
            this.sel = e.target.value;
                if(fel == sel) {
                    document.getElementById("otherfinalAlert1").style.display = "block";
                }else{
                    document.getElementById("otheroriginAlert").style.display = "none";
                    document.getElementById("otherfinalAlert1").style.display = "none";
                }
            break;
            case "account_final":
            this.fel = e.target.value;
                if(fel == sel) {
                    document.getElementById("otherfinalAlert1").style.display = "block";
                }else if( e.target.value == 0 ||  e.target.value == null){
                    document.getElementById("otherfinalAlert2").style.display = "block";
                }else{
                    document.getElementById("otherfinalAlert1").style.display = "none";
                    document.getElementById("otherfinalAlert2").style.display = "none";
                }
            break;
            case "value":
                if(e.target.value == 0){
                    document.getElementById("othervalueAlert").style.display = "block";
                }else{
                    document.getElementById("othervalueAlert").style.display = "none";
                }
            break;
        }
        
    }

   

    const validarValorOther = (e)=>{
        
        $(e.target).val(function(index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }

    
    otherInputs.forEach((input) => {
        input.addEventListener('keyup',validarValorOther);
        input.addEventListener('blur',validarValorOther);
        input.addEventListener('keyup',validarFormularioOther);
        input.addEventListener('blur',validarFormularioOther);
    });
    

    otherSelects.forEach((select) => {
        select.addEventListener('change',validarFormularioOther);
    });
</script>