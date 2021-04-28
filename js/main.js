let verif = document.querySelectorAll(".ok");
let validBtns = document.querySelectorAll(".valide");

console.log(verif[0].dataset.info);

let count = 0

validBtns.forEach((btn)=>{
       btn.addEventListener('click',function(){
        let divRep = btn.parentNode.children
        
        for (let i = 0; i < divRep.length; i++) {

            if (divRep[i].classList.contains('ok')) {
                    
                if(divRep[i].dataset.info ==0){
                    divRep[i].style.backgroundColor = 'red'
                    
                   
                }else{
                    divRep[i].style.backgroundColor = 'green'
                    
                }

                if (divRep[i].checked  ) {
                    if(divRep[i].dataset.info ==1){
                        count ++
                        event.target.style.pointerEvents= "none";
                    }
                    else{
                        count --
                                        
                        event.target.style.pointerEvents= "none";
                    }
                 
                }
              
            }
        }


        alert('Ton score est de : ' + count);
    })
})