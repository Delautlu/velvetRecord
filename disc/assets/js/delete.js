var d1 = document.getElementById("suppr");

d1.addEventListener('click',validation);

function validation(e){

    function supprimer(){
        if(confirm("Vous désirez vraiment supprimer?")==true) {
            console.log("oui");
        }
        else {
            console.log("non");
            e.preventDefault() 
        }
    }
supprimer();
}