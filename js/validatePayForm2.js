let i2=0
let codes2=[]
let prices2=[]
let dates2=[]

function addToPayment(code,element){

    if(element.checked){
        let price=document.getElementById('price-'+code).value
        let date=document.getElementById('date-'+code).value
        
        let res=validateForm(date,price)
        if(res===1){
            alert("todos los campos son obligatorios")
            element.checked=false
        }
        if(res===2){
            document.getElementById('date-'+code).value=""
            alert("ingrese una fecha valida")
            element.checked=false
            
        }else{
            codes2.push(code)
            prices2.push(price)
            dates2.push(date)
            i2++;
        }
        
    }else{
        document.getElementById('price-'+code).value=""
        document.getElementById('date-'+code).value=""

        index=codes2.indexOf(code)
        codes2.splice(index,1)
        index=prices2.indexOf(code)
        prices2.splice(index,1)
        index=dates2.indexOf(code)
        dates2.splice(index,1)
        i--;

    }
   
}
function pay(action){
    let partner=$('#partner').val()
    let number=$('#number').val()
    switch(action){
        case 1:
            window.open(`../components/factura_instantanea.php?pid=${number}&&partner=${partner}&&codes=${codes2}&&prices=${prices2} `)
        break;
        default:
            window.open(`../components/factura_instantanea_afip.php?pid=${number}&&partner=${partner}&&codes=${codes2}&&prices=${prices2} `)
        break;
            
    }
}

function autoCompleteDate(element){
    let value=element.value
    if(value.length===2 || value.length===5){
        value+="/"
        document.getElementById(element.id).value=value
    }
    
}


function validateForm(date,price){
    let dateSeparated=date.split("/")
    //1
    if(date.length===10 && price.length>0){
        //2
        if(parseInt(dateSeparated[0])>=1 && parseInt(dateSeparated[0])<=31){
            //2
            if(parseInt(dateSeparated[1])>=1 && parseInt(dateSeparated[1])<=12){
                //codes2.push(code)
                //prices2.push(price)
                //dates2.push(date)
                return 0
            }else{return 2}
        }else{return 2}   
    }else{return 1}
    
}