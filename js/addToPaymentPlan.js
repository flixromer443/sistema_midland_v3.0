let i=0
let codes=[]

function addToPayment(code,element){

    if(element.checked){
        document.getElementById('paymentButton').style.display='block' 
        document.getElementById(code).classList.remove('bg-light');
        document.getElementById(code).classList.add('table-warning');
        document.getElementById(code).classList.add('border');
        document.getElementById(code).classList.add('border-primary');
        document.getElementById(code).style.opacity=0.7
        codes.push(code)
        i++;
    }else{
        document.getElementById(code).classList.remove('border-primary');
        document.getElementById(code).classList.remove('border');
        document.getElementById(code).classList.remove('table-warning');
        document.getElementById(code).classList.add('bg-light');
        document.getElementById(code).style.opacity=1
        index=codes.indexOf(code)
        codes.splice(index,1)
        i--;

    }
    if(i===0){
        document.getElementById('paymentButton').style.display='none' 
    }   
}
function pay(){
    const valores = window.location.search;

    const urlParams = new URLSearchParams(valores);

    let pid = urlParams.get('id');
    window.open(`../components/plan.php?pid=${pid}&&codes=${codes} `)
}
