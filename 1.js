function duplicateChar(kata){
    stringToArr = kata.split("")
    tmpArray = [];
    for(let i = 0 ; i < stringToArr.length; i++){
       if(tmpArray.length === 0) {
           tmpArray.push(stringToArr[i])
       }else {
           if(tmpArray.includes(stringToArr[i]) === false){
               tmpArray.push(stringToArr[i])
           }
       }
    
    }
    return tmpArray
}

console.log(duplicateChar("alagcgcdodol"));