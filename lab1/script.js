const minY = -3, maxY = 5;
const minR = 1, maxR = 4;
let x, y, r;

function isNumber(val){
    return !isNaN(parseFloat(val)) && isFinite(val);
}

function isFloat(val){
    return /^-?[0-9]?(.|,)[0-9]{0,4}$/.test(val);
}

function checkX(){
    const xvalue = [...document.querySelectorAll("input[name=xvalue]:checked")];
    if (xvalue.length === 0){
        return false;
    }
    x = xvalue.map(x => x.getAttribute('value'));
    return true;
}

function checkY() {
    let yField = document.getElementById("yvalue").value
    let yNumber = yField.replace(',','.');
    if (isNumber(yNumber) && isFloat(yNumber) && minY <= yNumber && yNumber <= maxY){
        y = yNumber;
        return true;
    }
    return false;
}

function checkR() {
    let rField = document.getElementById("rvalue").value
    let rNumber = rField.replace(',','.');
    if (isNumber(rNumber) && isFloat(rNumber) && minR <= rNumber && rNumber <= maxR){
        r = rNumber;
        return true;
    }
    return false;
}

function validateForm(){
    let msg = '';
    if(!checkX()){
        msg += 'Для X нужно выбрать один из вариантов\n';
    }
    if(!checkY()){
        msg += 'В поле Y должно быть число от -3 до 5 (не более 4 знаков после запятой)\n';
    }
    if(!checkR()){
        msg += 'В поле R должно быть число от 1 до 4 (не более 4 знаков после запятой)\n';
    }
    if(msg !== ''){
        alert(msg)
        return false;
    } else {
        return true;
    }
}