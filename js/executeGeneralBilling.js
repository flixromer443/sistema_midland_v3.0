function execute(){
    document.getElementById('generalModal').innerHTML='<div class="container" style="text-align: center;align-content:center;"><h1>Cargando</h1><div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div><div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div><div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div><div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span> </div><div class="spinner-grow text-primary" role="status"> <span class="visually-hidden">Loading...</span></div></div>'
    for(i=1;i<=3;i++){
        document.getElementById('btn'+i).disabled=true
    }

    $.ajax({
     url:'../abm/abm_user.php',
     type:'POST',
     dataType:'JSON',
     data:{
       'verbo':'general_billing',
     },

   }).then(function(datos){
       if(datos===0){
           document.getElementById('generalModal').innerHTML='<div class="alert alert-success d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg><div>La operaci&oacute;n ha finalizado exitosamente.</div></div>'
           setTimeout(function(){window.location.reload()},2000)
       }else{
           document.getElementById('generalModal').innerHTML='<div class="alert alert-warning d-flex align-items-center" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg><div><strong>Error: </strong>la facturaci&oacute;n de este mes ya fue emitida anteriomente.</div></div>'
           setTimeout(function(){window.location.reload()},2000)
        }
    }) 
   
}