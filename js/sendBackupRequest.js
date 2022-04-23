function sendRequest(){
    let files=['accounts','activities','families','general_billings','partners_activities','partners']
    document.getElementById('modal-bkp').style.display='none'
    document.getElementById('loader').style.display='block'
    document.getElementById('modal-bkp').style.display='block'
    document.getElementById('loader').style.display='none'
    document.getElementById('btn-modal').click()
    setTimeout(() => {generateFiles(files[0])}, 1000);
    setTimeout(() => {generateFiles(files[1])}, 2000);
    setTimeout(() => {generateFiles(files[2])}, 3000);
    setTimeout(() => {generateFiles(files[3])}, 4000);
    setTimeout(() => {generateFiles(files[4])}, 5000);
    setTimeout(() => {generateFiles(files[5])}, 6000);

}
function generateFiles(file){
    try {
        $.ajax({
          url:'./services/backup.php',
          type:'POST',
          dataType:'JSON',
          data:{
            'file':file,
            
          },
     
        }).then(function(datos){
            console.log(datos)
            location.href=`./files/${file}.csv`
         })    
        
       } catch (error) {
         console.log(error)
       }
}