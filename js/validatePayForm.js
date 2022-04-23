let i=0
let codes=[]
let prices=[]
let dates=[]

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
            
        }else if(res===0){
            codes.push(code)
            prices.push(price)
            dates.push(date)
            i++;
        }
        
    }else{
        document.getElementById('price-'+code).value=""
        document.getElementById('date-'+code).value=""

        index=codes.indexOf(code)
        codes.splice(index,1)
        index=prices.indexOf(code)
        prices.splice(index,1)
        index=dates.indexOf(code)
        dates.splice(index,1)
        i--;

    }
   
}
function pay(action){
    let partner=$('#partner').val()
    let number=$('#number').val()
    switch(action){
        case 1:
            window.open(`./components/factura_instantanea.php?pid=${number}&&partner=${partner}&&codes=${codes}&&prices=${prices}&&dates=${dates} `)
        break;
        default:
            window.open(`./components/factura_instantanea_afip.php?pid=${number}&&partner=${partner}&&codes=${codes}&&prices=${prices}&&dates=${dates} `)
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
                //codes.push(code)
                //prices.push(price)
                //dates.push(date)
                return 0
            }else{return 2}
        }else{return 2}   
    }else{return 1}
    
}