let i=0
let codes=[]
let prices=[]
function addToPayment(code,element){

    if(element.checked){
        let price=document.getElementById('price-'+code).value
        if(price>0){
            codes.push(code)
            prices.push(price)
        }else{
            alert("Ingrese un monto por favor.")
            element.checked=false
        }
        i++;
    }else{
        document.getElementById('price-'+code).value=""
        index=codes.indexOf(code)
        codes.splice(index,1)
        index=prices.indexOf(code)
        prices.splice(index,1)

        i--;

    }
   
}
function pay(action){
    let partner=$('#partner').val()
    let number=$('#number').val()
    switch(action){
        case 1:
            window.open(`./components/factura_instantanea.php?pid=${number}&&partner=${partner}&&codes=${codes}&&prices=${prices} `)
        break;
        default:
            window.open(`./components/factura_instantanea_afip.php?pid=${number}&&partner=${partner}&&codes=${codes}&&prices=${prices} `)
        break;
            
    }
}
