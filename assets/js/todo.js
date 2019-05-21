function check() {
    let bouton = document.getElementById("valider");
    let x = document.getElementsByClassName("check");
    let flag;
    for (let i = 0; i < x.length; i++) {
        if(x[i].checked === true){
          flag = 1;
        }
    }
    if (flag === 1){
        bouton.style.display = "block";
    } 
    else {
        bouton.style.display ="none";
    }
} 


function check2() {
    let bouton2 = document.getElementById("valide");
    let x2 = document.getElementsByClassName("check2");
    let flag2;
    for (let i = 0; i < x2.length; i++) {
        if(x2[i].checked === true){
          flag2 = 1;
        }
    }
    if (flag2 === 1){
        bouton2.style.display = "block";
    } 
    else {
        bouton2.style.display ="none";
    }
} 

// Fonction recherche

function myFunction() {
    // Declare variables 
    let input, filter, table, tr, td, j, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementsById("tach");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (j = 0; j < tr.length; j++) {
      td = tr[j].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[j].style.display = "";
        } else {
          tr[j].style.display = "none";
        }
      } 
    }
  }
