////When you click cont 2 the cmp should diplay in side bar and pop up
//Don't Allow numbers in address
//
//Indicate RESERVATION FEE is payable today 
///
//
///buttons on page 2 are not responsive 


//pages
const page1= document.querySelector(".paymentOption");
const page2= document.querySelector(".calculator");
const page3 = document.querySelector(".personalInfo");
const page4= document.querySelector(".schedule");
const page5= document.querySelector('.payment');
const form=document.querySelector(".pay");

//buttons
const cont1=document.querySelector('.cont1');
const cont2=document.querySelector('.cont2');
const cont3=document.querySelector('.cont3');
const cont4=document.querySelector('.cont4');
const prev1=document.querySelector('.prev1');
const prev2=document.querySelector('.prev2');
const prev3=document.querySelector('.prev3');
const prev4=document.querySelector('.prev4');
const checkout=document.querySelector(".checkout");


//spans
const span1= document.querySelector("#span1");
const span2= document.querySelector("#span2");
const span3= document.querySelector("#span3");
const span4= document.querySelector("#span4");

//span connectors 
const firstRight=document.querySelector("#firstRight");
const firstLeft=document.querySelector("#firstLeft");
const secondRight=document.querySelector("#secondRight");
const secondLeft=document.querySelector("#secondLeft");
const thirdRight=document.querySelector("#thirdRight");
const thirdLeft=document.querySelector("#thirdLeft");

//span labels
const section1=document.querySelector("#section1");
const section2=document.querySelector("#section2");
const section3=document.querySelector("#section3");
const section4=document.querySelector("#section4");

//All Inputs
/*1*/const payOp1= document.querySelector("#payOp1");
const payOp2= document.querySelector("#payOp2");
/*2*/ const balloon= document.querySelector('#balloon');
const balloonValue= document.querySelector('#balloonValue');
const finMonths= document.querySelector('#finMonths');
const finMonthsValue=document.querySelector('#finMonthsValue');
const installType=document.querySelector('#installType');
const deposit= document.querySelector('#downpay');
/*3*/const name= document.querySelector("#name");
const sur=document.querySelector("#surname");
const idtype=document.querySelector("#idtype");
const idvalue=document.querySelector("#idvalue");
const cell=document.querySelector("#cell");
const housenum=document.querySelector("#housenum");
const address=document.querySelector("#address");
const suburb=document.querySelector("#suburb");
const code=document.querySelector("#code");
const city=document.querySelector("#city");
/*4*/const date= document.querySelector("#scheduleDate");
const deliveryOp1= document.querySelector("#collect");
const deliveryOp2= document.querySelector("#deliver");


/*Summary Elements */
const delivery= document.querySelector(".delivery");
const deliveryAmt=document.querySelector(".deliveryAmt");
const sumPayOp=document.querySelector(".sumPayOp");
const aquireOp=document.querySelector(".aquireOp");
const sumDateLabel=document.querySelector(".sumDateLabel");
const sumDateDisplay=document.querySelector(".sumDateDisplay");
const totAmt2=document.querySelector(".totAmt2");
const baseAmt1=document.querySelector(".baseAmt1");
const vatAmt=document.querySelector(".vatAmt");
const totAmt3=document.querySelector(".totAmt3");

/*page 2 elements*/
const installTypeDis=document.querySelector('.installTypeDis');
const depositDisplay=document.querySelector('.depositDisplay');
const timeDisplay=document.querySelector('.timeDisplay');
const balloonDisplay=document.querySelector('.balloonDisplay');
const cmp=document.querySelector('.cmp');
const balloonPannel=document.querySelector('.balloonHide');
const balloonPannel1=document.querySelector('.balloonHide1');
const principle=document.querySelector('.principle');
const totalFinance=document.querySelector('.totalFinance');
const totInterest=document.querySelector('.totInterest');
const sidePMT=document.querySelector('.sidePMT');

//popup elements
const popupBtn= document.querySelector("#popupBtn");
const popupBar= document.querySelector(".popupbar");

//validation functions
function checkName(){
    var errorMsg=document.querySelector("#nameError");
    var input=name.value.trim();
    if (input==""){
        errorMsg.innerHTML="This field is mandatory"
        name.style.borderBottom="red 2px solid";
        return false;
    }else{
        name.style.borderBottom="2px solid #bbb";
        errorMsg.innerHTML="";
        return true;
    }
}

function checkSur(){
    var input=sur.value.trim();
    var errorMsg=document.querySelector("#surError");
    if (input==""){
        sur.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="This field is mandatory"
        return false;
    }else{
        sur.style.borderBottom="2px solid #bbb";
        errorMsg.innerHTML="";
        return true;
    }
}

function checkID(){
    var input=idvalue.value.trim();
    var errorMsg=document.querySelector("#idvalueError");
    if (input==""){
        idvalue.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="This field is mandatory"
        return false;
    }else if((option==1) && !input.match(/^\d+$/)){
        idvalue.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="must contain numerical values only";
    }
    else if((option==1) && (input.length<13 || input.length>13)){
        idvalue.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="Must consist of 13 digits"
        return false;
    }
    else{
        idvalue.style.borderBottom="2px solid #bbb";
        errorMsg.innerHTML="";
        return true;
    }

}

function checkCell(){
    var input=cell.value.trim();
    var errorMsg=document.querySelector("#cellError");
    if (input==""){
        cell.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="This field is mandatory"
        return false;
    }else if(!input.match(/^\d+$/)){
        cell.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="must contain numerical values only";
    }else if(!input.match(/^0[6-8][0-9]{8}$/)){
        cell.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="Invalid cell phone number"
        return false;
    }
    else{
        cell.style.borderBottom="2px solid #bbb";
        errorMsg.innerHTML="";
        return true;
       
    }
}
function checkHouseNum(){
    var input=housenum.value.trim();
    var errorMsg=document.querySelector("#housenumError");
    if (input==""){
        housenum.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="This field is mandatory"
        return false;
    }else if(!input.match(/^\d+$/)){
        housenum.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="must contain numerical values only";
    }
    else{
        housenum.style.borderBottom="2px solid #bbb";
       errorMsg.innerHTML="";
       return true;
    }

}
function checkAddress(){
    var input=address.value.trim();
    var errorMsg=document.querySelector("#addressError");
    if (input==""){
        address.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="This field is mandatory"
        return false;
    }else{
       address.style.borderBottom="2px solid #bbb";
       errorMsg.innerHTML="";
       return true;
    }
}

function checkSuburb(){
    var input=suburb.value.trim();
    var errorMsg=document.querySelector("#suburbError");
    if (input==""){
        suburb.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="This field is mandatory"
        return false;
    }else{
        suburb.style.borderBottom="2px solid #bbb";
        errorMsg.innerHTML="";
        return true;
    }
}

function checkCode(){
    var input=code.value.trim();
    var errorMsg=document.querySelector("#codeError");
    if (input==""){
        code.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="This field is mandatory"
        return false;
    }else if(!input.match(/^\d+$/)){
        code.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="must contain numerical values only";
    }
    else if(input.length< 4){
        code.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="Must be 4 digits long"
        return false;
    }
    else{
        code.style.borderBottom="2px solid #bbb";
        errorMsg.innerHTML="";
        return true;
    }
}

function checkCity(){
    var input=city.value.trim();
    var errorMsg=document.querySelector("#cityError");
    if (input==""){
        city.style.borderBottom="red 2px solid";
        errorMsg.innerHTML="This field is mandatory";
        return false;
    }else{
        city.style.borderBottom="2px solid #bbb";
        errorMsg.innerHTML="";
        return true;
    }

}

function checkDate(){
    var input=date.value;
    var errorMsg=document.querySelector("#dateError");
    if(input==""){
        date.style.border="red 2px solid";
        errorMsg.innerHTML="You need to select a date";
        return false;
    }else{
        date.style.border="#bbb 2px solid";
        errorMsg.innerHTML="";
        return true;
    }
}


function calculateCMP(){
    let r=0.125;
    let d=parseFloat(deposit.value);
    if(deposit.value==""){
        d=0;
    }
    let t=parseInt(finMonths.value);
    let p=parseFloat(principle.innerHTML);
    let n=12
    let pmt;
    
 if (selectedInstallment==0){
    balloonPannel.style.display="none";
    balloonPannel1.style.display="none";
    p=p-d;

 }else if(selectedInstallment=1){
    let b=parseInt(balloon.value)/100; //percentage of balloon we are working with
    balloonPannel.style.display="flex";
    balloonPannel1.style.display="block";
    p=p-d;
    let balPercent= parseInt(balloon.value)/100;
    let balAmt=(p*balPercent).toFixed(2);
    p=p-balAmt;
    balloonDisplay.innerHTML=balAmt.toString();
 }

 let numerator=p*(r/n);
 let denominator=1-Math.pow((1+(r/n)),(-t));
 pmt=(numerator/denominator).toFixed(2);
 cmp.innerHTML=pmt.toString();
 let total=(pmt*t).toFixed(2);
 totalFinance.innerHTML=total.toString();
 timeDisplay.innerHTML=finMonths.value;
 totInterest.innerHTML=(total-p).toFixed(2).toString();
}


//On input functions
name.addEventListener("input",()=>{
    checkName();

})

sur.addEventListener("input",()=>{
   checkSur();

})

var option=0;

idvalue.addEventListener("input",()=>{
    checkID();
})

idtype.addEventListener("change", ()=>{
    option=idtype.selectedIndex;
    checkID();

})

cell.addEventListener("input",()=>{
   checkCell();

})

housenum.addEventListener('input',()=>{
    checkHouseNum();
})
address.addEventListener("input",()=>{
   checkAddress();
})

suburb.addEventListener("input",()=>{
   checkSuburb();
})

code.addEventListener("input",()=>{
    checkCode();

})

city.addEventListener("input",()=>{
    checkCity();
})

balloon.addEventListener("input",()=>{
    balloonValue.innerHTML=balloon.value;
    
    calculateCMP();
})

timeDisplay.innerHTML=finMonths.value;
finMonths.addEventListener("input",()=>{
    finMonthsValue.innerHTML=finMonths.value;
    calculateCMP();
})

//begin claculations for financing
deposit.addEventListener('input',()=>{
   
    
   var errorMsg=document.querySelector('#downError');
   var p=parseFloat(principle.innerHTML);
   var d=parseFloat(deposit.value);
   if(deposit.value==""){
    d=0
   }else{
        errorMsg.innerHTML="";
        deposit.style.borderBottom="#bbb 2px solid";
   }
    if(p==d){ 
        errorMsg.innerHTML="Your Deposit Can't Be Equal To The Principle Amount";
        deposit.style.borderBottom="red 2px solid";
    }else if(d>p){
        errorMsg.innerHTML="Your Deposit Can't Be Greater Than The Principle Amount";
        deposit.style.borderBottom="red 2px solid";
    }
    else{
        errorMsg.innerHTML="";
        deposit.style.borderBottom="#bbb 2px solid";
        depositDisplay.innerHTML=d;
        calculateCMP();
    } 
})

let selectedInstallment=0;
installTypeDis.innerHTML="Regular";
installType.addEventListener("change", ()=>{
    selectedInstallment=installType.selectedIndex;
    if(selectedInstallment==0){
        installTypeDis.innerHTML="Regular"
    }else{
        installTypeDis.innerHTML="Balloon"
    }
    calculateCMP();

})



//payment option
let selectedPayOp="cash";
payOp1.addEventListener('input',()=>{
     selectedPayOp="cash";
     return selectedPayOp;
})
payOp2.addEventListener('input',()=>{
    selectedPayOp="finance";
     return selectedPayOp;
})

//Schedule delivery date
date.addEventListener("input", ()=>{
    checkDate();
})

//delivery option
let selectedDeliveryOp= "collect";
deliveryOp1.addEventListener('input',()=>{
    selectedDeliveryOp="collect";
    return selectedDeliveryOp;
})

deliveryOp2.addEventListener('input',()=>{
    selectedDeliveryOp="deliver";
    return selectedDeliveryOp;
})



// PAGE TRANSITONS

//Page 1 to Page 2 OR Page 3
cont1.addEventListener('click',()=>{
    if (selectedPayOp=="cash"){
        page1.style.transform=" translateX(-1000px)";
        page3.style.transform="translateX(0)";
        cont1.style.transform="translateX(-1000px)";
        cont3.style.transform="translateX(0)";
        prev2.style.transform="translateX(0)";
        span1.style.color="#007bff";
        span2.style.color="#fff";
        span2.style.border="#007bff 2px solid";
        span2.style.backgroundColor="#007bff";
        firstRight.style.backgroundColor="#007bff";
        firstLeft.style.backgroundColor="#007bff";
        section1.style.fontWeight="normal";
        section2.style.fontWeight="bolder";
        //summary information
        sumPayOp.innerHTML="Cash/Pre-Arranged Financing";
    }else{
        page1.style.transform=" translateX(-1000px)";
        page2.style.transform="translateX(0)";
        cont1.style.transform=" translateX(-1000px)";
        prev1.style.transform="translateX(0)";
        cont2.style.transform="translateX(0)";
        //summary inforation
        sumPayOp.innerHTML="Mr Ranger Financial Services";

    }
    document.documentElement.scrollTop = 0;
    
})
//P A G E 2
//forward to page 3 
cont2.addEventListener('click',()=>{
    var errorMsg=document.querySelector('#downError');
        if(deposit.value==""){
            errorMsg.innerHTML="Please Indicate A Deposit Amount";
            deposit.style.borderBottom="red 2px solid";
        }else{
            page2.style.transform=" translateX(-1000px)";
        cont2.style.transform=" translateX(-1000px)";
        prev1.style.transform=" translateX(-1000px)";
        page3.style.transform="translateX(0)";
        cont3.style.transform="translateX(0)";
        prev2.style.transform="translateX(0)";
        span1.style.color="#007bff";
        span2.style.color="#fff";
        span2.style.backgroundColor="#007bff"
        span2.style.border="#007bff 2px solid";
        firstRight.style.backgroundColor="#007bff";
        firstLeft.style.backgroundColor="#007bff";
        section1.style.fontWeight="normal";
        section2.style.fontWeight="bolder";
        document.documentElement.scrollTop = 0;
        sidePMT.style.border="red 1px solid";
        sidePMT.innerHTML="hello";
        }
          
        

    
})

//back to page 1
prev1.addEventListener('click',()=>{
    page2.style.transform="translateX(1000px)";
    prev1.style.transform="translateX(1000px)";
    cont2.style.transform="translateX(1000px)";
    page1.style.transform="translateX(0)";
    cont1.style.transform="translateX(0)";
    document.documentElement.scrollTop = 0;
    sidePMT.innerHTML="";

})


//P A G E 3

//forward to page 4 
cont3.addEventListener('click',()=>{

    if( checkName()==true && checkSur()==true && checkID()==true && checkCell()==true && checkHouseNum()==true && checkAddress()==true && checkSuburb() && checkCode()==true &&  checkCity()==true){
        
        page3.style.transform=" translateX(-1000px)";
        cont3.style.transform=" translateX(-1000px)";
        prev2.style.transform=" translateX(-1000px)";
        page4.style.transform="translateX(0)";
        cont4.style.transform="translateX(0)";
        prev3.style.transform="translateX(0)";
        span2.style.color="#007bff";
        span3.style.color="#fff";
        span3.style.backgroundColor="#007bff"
        span3.style.border="#007bff 2px solid";
        secondRight.style.backgroundColor="#007bff";
        secondLeft.style.backgroundColor="#007bff";
        section2.style.fontWeight="normal";
        section3.style.fontWeight="bolder";
        document.documentElement.scrollTop = 0;   
        
    }
    
})

//back to page 2 or page 1
prev2.addEventListener('click',()=>{
    if (selectedPayOp=="cash"){
        //page 1
        page1.style.transform=" translateX(0)";
        cont1.style.transform=" translateX(0)";
    }else{
        //page 2
        page2.style.transform=" translateX(0)";
        prev1.style.transform=" translateX(0)";
        cont2.style.transform="translateX(0)";
    }

    page3.style.transform="translateX(1000px)";
    prev2.style.transform="translateX(1000px)";
    cont3.style.transform="translateX(1000px)";
    span2.style.color="black";
    span2.style.backgroundColor="#fff";
    span2.style.border="silver 2px solid";
    span1.style.color="#fff";
    span1.style.backgroundColor="#007bff"
    span1.style.border="#007bff 2px solid";
    section1.style.fontWeight="bolder";
    section3.style.fontWeight="normal";
    firstRight.style.backgroundColor="silver";
    firstLeft.style.backgroundColor="silver";
    document.documentElement.scrollTop = 0;

})

// P A G E 4

//forward to page 5
cont4.addEventListener('click',()=>{
    //summary information
     
    if(selectedDeliveryOp=='collect'){
        delivery.style.display="none";
        deliveryAmt.style.display="none";
        aquireOp.innerHTML="Collection";
        sumDateLabel.innerHTML="Date for collection";
        let basePrice= parseFloat(baseAmt1.innerHTML);
        let vat= parseFloat(vatAmt.innerHTML);
        let finalTotal= (1000+500+basePrice+vat).toFixed(2);
        totAmt2.innerHTML="R" +finalTotal.toString();
        totAmt3.innerHTML=finalTotal.toString();
        checkout.value=finalTotal.toString();
        
    }else{
        delivery.style.display="block";
        deliveryAmt.style.display="block";
        aquireOp.innerHTML="Delivery";
        sumDateLabel.innerHTML="Date for delivery";
        let basePrice= parseFloat(baseAmt1.innerHTML);
        let vat= parseFloat(vatAmt.innerHTML);
        let finalTotal= (1000+500+250+basePrice+vat).toFixed(2);
        totAmt2.innerHTML="R" +finalTotal.toString();
        totAmt3.innerHTML=finalTotal.toString();
        checkout.value=finalTotal.toString();
    }
   
    sumDateDisplay.innerHTML=date.value;
    
    if (checkDate()==true){
        page4.style.transform=" translateX(-1000px)";
        cont4.style.transform=" translateX(-1000px)";
        prev3.style.transform=" translateX(-1000px)";
        page5.style.transform="translateX(0)";
        prev4.style.transform="translateX(0)"
        span3.style.color="#007bff";
        span4.style.color="#fff";
        span4.style.backgroundColor="#007bff"
        span4.style.border="#007bff 2px solid";
        thirdRight.style.backgroundColor="#007bff";
        thirdLeft.style.backgroundColor="#007bff";
        section3.style.fontWeight="normal";
        section4.style.fontWeight="bolder";
        document.documentElement.scrollTop = 0; 
    }
})

//back to page 3
prev3.addEventListener('click',()=>{
    
    page4.style.transform="translateX(1000px)";
    cont4.style.transform=" translateX(1000px)";
    page3.style.transform=" translateX(0)";
    cont3.style.transform=" translateX(0)";
    prev2.style.transform=" translateX(0)";
    prev3.style.transform="translateX(1000px)";
    span3.style.color="black";
    span3.style.backgroundColor="#fff";
    span3.style.border="silver 2px solid";
    span2.style.color="#fff";
    span2.style.backgroundColor="#007bff"
    span2.style.border="#007bff 2px solid";
    section2.style.fontWeight="bolder";
    section3.style.fontWeight="normal";
    secondRight.style.backgroundColor="silver";
    secondLeft.style.backgroundColor="silver";
    document.documentElement.scrollTop = 0;

})

// P A G E 5

//complete order
checkout.addEventListener("click",()=>{
    if(checkCardName()==true && checkCardNum()==true && checkExp()==true && checkCVV()==true){
        form.submit();
    }
})


// back to page 4
prev4.addEventListener('click',()=>{
    page5.style.transform="translateX(1000px)";
    prev4.style.transform="translateX(1000px)";
    page4.style.transform=" translateX(0)";
    cont4.style.transform=" translateX(0)";
    prev3.style.transform=" translateX(0)";
    span4.style.color="black";
    span4.style.backgroundColor="#fff";
    span4.style.border="silver 2px solid";
    span3.style.color="#fff";
    span3.style.backgroundColor="#007bff"
    span3.style.border="#007bff 2px solid";
    section3.style.fontWeight="bolder";
    section4.style.fontWeight="normal";
    thirdRight.style.backgroundColor="silver";
    thirdLeft.style.backgroundColor="silver";
    document.documentElement.scrollTop = 0;

})

/*P O P U P    T R A N S I T I O N S*/
popupBtn.addEventListener('click', ()=>{
    if (popupBtn.innerHTML=='^')
    {
        popupBar.style.bottom="0";
        popupBtn.innerHTML="v";
    }else{
        popupBar.style.bottom="-100px";
        popupBtn.innerHTML="^";
    }
})





    


