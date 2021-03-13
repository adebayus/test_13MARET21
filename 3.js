function cetakGambar(number){
    if (number%2 != 0){
        return `${number} bukan bilangan genap`
    }
    var kalimat = "-- Panjang -- \n";
    for (let i = 0; i < number; i++) {
        tmpStr = ""
        tmpStep = 3
        for (let j = 1; j < number+1; j++) {
            if(i == 0 || i == number-1){
                tmpStr += "+"
            }else{
                if(j == tmpStep){
                    tmpStr += "+"
                    tmpStep+=3
                }else{
                    tmpStr += "="
                }
                
            }
            
        }
        kalimat += tmpStr
        kalimat += "\n"
        
    }
    return kalimat
}
console.log(cetakGambar(8))