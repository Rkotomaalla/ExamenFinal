
<!-- eto ny contenu an ilay resultat no afindra page -->
 
        <div class="contains_result">
            <img src="../../assets/images/background/field-5065671_1920.jpg" alt="">
            <div id="resultat_user">
                <p>Resultat</p>
                <p id="date"></p>
            </div>
            <table class="table_result">
                <tr>
                    <th>Total ceuillette</th>
                    <th>Poids Restant</th>
                    <th>Coût de revient par kg</th>
                </tr>
                <tr>
                    <td id="total"></td>
                    <td id="poids"></td>
                    <td id="cout"></td>
                </tr>
            </table>
            <div id="select_date">
                <form action="">
                    <p>Selectionner les dates</p>
                    <label for="">Date Minimum</label>
                    <input type="date" placeholder="date minimum" id="dateMin" required>
                    <label for="">Date Maximum</label>
                    <input type="date" placeholder="date maximum" id="dateMax" required>
                    <input type="button" value="recherchez" id="search">
                    <p id="error_date"></p>
                </form>
            </div>
<!-- js ny -->
<script>
    function getXHR() {
        var xhr; 
        try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
        catch (e) 
        {
            try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
            catch (e2) 
            {
            try {  xhr = new XMLHttpRequest();  }
            catch (e3) {  xhr = false;   }
            }
        }
        return xhr;
    }

    function getTotalCueillis(date1,date2){ 
        var xhr = getXHR();
        xhr.addEventListener("load", function(event) {
            var reponse = xhr.responseText;
            var tout = document.getElementById("total");
            tout.textContent = reponse;
            console.log(reponse);
        });

        // Definissez ce qui se passe en cas d'erreur
        xhr.addEventListener("error", function(event) {
            alert('Oups! Quelque chose s\'est mal passé.');
        });
        
        // Configurez la requête
        xhr.open("GET", "../../pages/traitements/getTotalCueillis.php?date1="+date1+"&date2="+date2+""); 

        // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
        xhr.send(null); 
    }
    function getTotalPoidsRestant(date1,date2){ 
        var xhr = getXHR();
        xhr.addEventListener("load", function(event) {
            var reponse = xhr.responseText;
            var tout = document.getElementById("poids");
            tout.textContent = reponse;
            console.log(reponse);
        });

        // Definissez ce qui se passe en cas d'erreur
        xhr.addEventListener("error", function(event) {
            alert('Oups! Quelque chose s\'est mal passé.');
        });
        
        // Configurez la requête
        xhr.open("GET","../../pages/traitements/getTotalPoidsRestants.php?date1="+date1+"&date2="+date2+""); 

        // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
        xhr.send(null); 
    }
    function getCoutDeRevient(date1,date2){ 
        var xhr = getXHR();
        // var formdata = new FormData(form) ;
        // Définissez ce qui se passe si la soumission s'est opérée avec succès
        xhr.addEventListener("load", function(event) {
            // console.log(xhr.responseText);
            var reponse = xhr.responseText;
            var tout = document.getElementById("cout");
            tout.textContent = reponse;
            console.log(reponse);
        });

        // Definissez ce qui se passe en cas d'erreur
        xhr.addEventListener("error", function(event) {
            alert('Oups! Quelque chose s\'est mal passé.');
        });
        
        // Configurez la requête
        xhr.open("GET","../../pages/traitements/getCoutDeRevient.php?date1="+date1+"&date2="+date2+""); 

        // Les données envoyées sont ce que l'utilisateur a mis dans le formulaire
        xhr.send(null); 
    }
</script>
<script defer>
                const searchBtn = document.getElementById("search");
                    // listener enregistrena an ilay date
                searchBtn.addEventListener("click",function() {
                    const dateMin=document.getElementById("dateMin");
                    const dateMax=document.getElementById("dateMax");
                    const error=document.getElementById("error_date");
                    if(dateMin.value>dateMax.value){
                        error.innerHTML="le minimum doit etre inferieur à la date maximale"
                    }
                    else if(dateMin.value == "" || dateMax.value == ""){ 
                        error.innerHTML="date required";
                    }  
                    else{
                        getTotalCueillis(dateMin.value,dateMax.value);
                        getTotalPoidsRestant(dateMin.value,dateMax.value);
                        getCoutDeRevient(dateMin.value,dateMax.value);
                        const date = document.getElementById("date");
                        date.innerHTML=dateMin.value + " - " + dateMax.value ;
                        const div=document.getElementById("select_date");
                        div.style.display="none";     
                    }       
                                        
                });
            </script>
        </div>