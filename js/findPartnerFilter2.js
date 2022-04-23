function changeFilter(filter){
    try {
     $.ajax({
       url:'../services/partners_filter.php',
       type:'POST',
       dataType:'JSON',
       data:{
         'filter':filter,
         
       },
  
     }).then(function(datos){
         document.getElementById('filter_response').innerHTML=datos
         document.getElementById('submit').hidden=false
         document.getElementById('submit').value=filter
      })    
     
    } catch (error) {
      console.log(error)
    }
 }
 function findPartners(){
     $.ajax({
      url:'../services/partners_service2.php',
      type:'POST',
      dataType:'JSON',
      data:{
        'filter':$('#submit').val(),
        'search':$('#search').val(),
        'headline':$('#headline').val()
      },
 
    }).then(function(datos){
        document.getElementById('response').innerHTML=datos
        
     }) 
    
 }