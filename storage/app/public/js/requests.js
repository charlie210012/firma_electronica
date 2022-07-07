$('#createClient').submit(function (e) { 
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "POST",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url:  '/clients',
        data: datos,
        success: function(r){
            console.log(r);
            $('#ownModal').modal('hide');
            if(r['status']=="Error"){
                Swal.fire({        
                title: '¡Atención!',
                text: 'Se ha generado un error al crear el cliente', 
                icon: 'error',
                }).then((result)=>{
                    $('#ownModal').modal('show');
                });
            }else{
                Swal.fire({        
                title: '¡Felicidades!',
                text: 'El cliente fue creado exitosamente',
                icon: 'success',
                 }).then((result) =>{
                        location.reload();
                 });
                    
            }
            
            
        }
        
    })
    return false

});

$('#addBusiness').submit(function (e) { 
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "POST",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url:  '/business',
        data: datos,
        success: function(r){
            console.log(r);
            $('#otherModal').modal('hide');
            if(r['status']=="Error"){
                Swal.fire({        
                title: '¡Atención!',
                text: 'Se ha generado un error al crear el negocio', 
                icon: 'error',
                }).then((result)=>{
                    $('#otherModal').modal('show');
                });
            }else{
                Swal.fire({        
                title: '¡Felicidades!',
                text: 'El negocio fue creado exitosamente',
                icon: 'success',
                 }).then((result) =>{
                        location.reload();
                 });
                    
            }
            
            
        }
        
    })
    return false

});

$('#otherTransfer').submit(function (e) { 
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "POST",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url:  '/transaction',
        data: datos,
        success: function(r){
            $('#otherModal').modal('hide');
            if(r['status']=="Error"){
                Swal.fire({        
                title: '¡Atención!',
                text: r['mensaje'], 
                icon: 'error',
                }).then((result)=>{
                    $('#otherModal').modal('show');
                });
            }else{
                Swal.fire({        
                title: '¡Felicidades!',
                text: r['mensaje'],
                icon: 'success',
                 }).then((result) =>{
                        location.reload();
                 });
                    
            }
            
            
        }
        
    })
    return false

});

$('#registerOther').submit(function (e) { 
    e.preventDefault();
    var datos = $(this).serialize();
    $.ajax({
        type: "POST",
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url:  '/registerAccount',
        data: datos,
        success: function(r){
            $('#registerOtherModal').modal('hide');
            if(r['status']=="Error"){
                Swal.fire({        
                title: '¡Atención!',
                text: r['mensaje'], 
                icon: 'error',
                }).then((result)=>{
                    $('#registerOtherModal').modal('show');
                });
            }else{
                Swal.fire({        
                title: '¡Felicidades!',
                text: r['mensaje'],
                icon: 'success',
                 }).then((result) =>{
                        location.reload();
                 });
                    
            }
            
            
        }
        
    })
    return false

});

function reports(){
    id = document.getElementById('account_report').value;

    if(id!==0){
        document.getElementById("reportTable").style.display = "block";
    }else{
        document.getElementById("reportTable").style.display = "none";
    }

    $.ajax({
        type:'GET',
        url: "/report/"+id,
        data:id,
        success: function(r){
            console.log(r)
            $('#transactions').DataTable({
                "language":{
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                    },
                destroy: true,
                "aaData" : r,
                "columns": [
                    {"data": "fecha"},
                    {"data": "cuenta_origen"},
                    {"data": "cuenta_destino"},
                    {"data": "valor"},
                    {"data": "Tipo_transaccion"}
                ],
            });       
                
        }
    });
}

$('#clients').DataTable({
    "language":{
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
    destroy: true,
    // "aaData" : r,
    // "columns": [
    //     {"data": "fecha"},
    //     {"data": "cuenta_origen"},
    //     {"data": "cuenta_destino"},
    //     {"data": "valor"},
    //     {"data": "Tipo_transaccion"}
    // ],
}); 

function borrar(id)
{
    Swal.fire({
        title: 'Estas segur@?',
        text: "No podras revertir esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, deseo eliminarlo!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url:  '/oauth/clients/'+id,
                data: '',
                success: function(r){
                    console.log(r)
                    if(r != undefined){
                        Swal.fire({        
                        title: '¡Atención!',
                        text:'No se pudo eliminar a este cliente', 
                        icon: 'error',
                        }).then((result)=>{
                            $('#registerOtherModal').modal('show');
                        });
                    }else{
                        Swal.fire({        
                        title: '¡Felicidades!',
                        text: 'El cliente ha sido eliminado con exito',
                        icon: 'success',
                        }).then((result) =>{
                                location.reload();
                        });
                            
                    }
                    
                    
                }
                
            })
        //   Swal.fire(
        //     'Deleted!',
        //     'Your file has been deleted.',
        //     'success'
        //   )
        }
      })
}

function borrarBusiness(id)
{
    Swal.fire({
        title: 'Estas segur@?',
        text: "No podras revertir esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, deseo eliminarlo!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url:  '/business/'+id,
                data: '',
                success: function(r){
                    console.log(r)
                    if(r['status'] !== 'OK'){
                        Swal.fire({        
                        title: '¡Atención!',
                        text:'No se pudo eliminar a este cliente', 
                        icon: 'error',
                        }).then((result)=>{
                            $('#registerOtherModal').modal('show');
                        });
                    }else{
                        Swal.fire({        
                        title: '¡Felicidades!',
                        text: 'El cliente ha sido eliminado con exito',
                        icon: 'success',
                        }).then((result) =>{
                                location.reload();
                        });
                            
                    }
                    
                    
                }
                
            })
        }
      })
}