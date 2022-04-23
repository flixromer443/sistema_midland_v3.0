function changeCheckbox(id){
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
              'verbo':'my_courses',
              'cid':id,
              'pid':$("#pid").val(),
              'action':0
            },
       
          }).then(function(datos){
            //document.getElementById('response').innerHTML=datos
              
           })
        
    }else{
        document.getElementById(id).classList.add("bg-success")
        $.ajax({
            url:'../abm/abm_user.php',
            type:'POST',
            dataType:'JSON',
            data:{
              'verbo':'my_courses',
              'cid':id,
              'pid':$("#pid").val(),
              'action':1
            },
       
          }).then(function(datos){
              
           })
    }
}