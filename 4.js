function countWord(string, word){
    if(word.length>string.length){
        alert("error");
    }else{
        let arr = [];
    
        for(let i=0; i<=(string.length-word.length);i++){
            let counter = string[i];
            for(let j=1; j<word.length;j++){
                counter = counter + string[i+j];
            }
            arr.push(counter);
            counter = counter.split("");
            counter = counter.reverse();
            counter = counter.join(""); 
            arr.push(counter);
        }
        let count = 0;
        for(let k=0; k<arr.length; k++){
            if(arr[k] == word){
                count++;
            }
        }
       alert("ditemukan " + count + " kali");
        }
}

countWord('Banananana','nana');