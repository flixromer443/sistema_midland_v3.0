function changeHeadlineCheckbox(id){
    let check=document.getElementById(id).checked
    if(check===false){
        document.getElementById(id).classList.remove("form-check-input")
        document.getElementById(id).classList.remove("bg-success")
        document.getElementById(id).classList.add("form-check-input")

      $.ajax({
            url:'../abm/abm_user.php',
            type:'POST',
            dataType:'JSON',
            data:{
              'verbo':'headline',
              'pid':id,
              'action':0
            },
       
          }).then(function(datos){
            setTimeout(function(){window.location.reload()},1000)
              
           })
        
    }else{
        document.getElementById(id).classList.add("bg-success")
        $.ajax({
            url:'../abm/abm_user.php',
            type:'POST',
            dataType:'JSON',
            data:{
              'verbo':'headline',
              'pid':id,
              'action':1
            },
       
          }).then(function(datos){
            setTimeout(function(){window.location.reload()},1000)
              
           })
    }
}