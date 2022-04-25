function sendSalarySettlement(){
    let settlementReceiver=$("#settlementReceiver").val()
    let settlementDocument=$("#settlementDocument").val()
    let settlementActivitie=$("#settlementActivitie").val()
    let settlementPercentage=$("#settlementPercentage").val()
    let settlementAmount=$("#settlementAmount").val()
    
    window.open(`./components/liquidacion.php?name=${settlementReceiver}&&document=${settlementDocument}&&activitie=${settlementActivitie}&&percentage=${settlementPercentage}&&amount=${settlementAmount}`)
}