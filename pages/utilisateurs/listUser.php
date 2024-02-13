<div id="ceuilleur_contains" class="y">
        <p>list des Ceuilleurs</p>
        <div id="ceuilleur_list">
            <div id="ceuiller" class="ceuilleur">
                <img src="../../../assets/images/profil/portrait-photo (1).jpg" alt="">
                <h4>fanomezantsoa</h4>
            </div>
            <div id="ceuiller" class="ceuilleur">
                <img src="../../../assets/images/profil/portrait-photo (1).jpg" alt="">
                <strong>fanomezantsoa</strong>
            </div>
            <div id="ceuiller" class="ceuilleur">
                <img src="../../../assets/images/profil/portrait-photo (1).jpg" alt="">
                <strong>fanomezantsoa</strong>
            </div>
            <div id="ceuiller" class="ceuilleur">
                <img src="../../../assets/images/profil/portrait-photo (1).jpg" alt="">
                <strong>fanomezantsoa</strong>
            </div>
        </div>
    </div>
    <div id="ceuilleur_information" >
        <img src="../../../assets/images/icon/marque-de-croix.png" alt="" id="cancel">
        
        <table class="table_result" id="info_tables">
            <tr>
                <th>Date</th>
                <th>nom</th>
                <th>poids</th>
                <th>bonus(%)</th>
                <th>mallus(%)</th>
                <th>montant paiement</th>
            </tr>
            <tr>
                <td>12/12/2004</td>
                <td>tendrysoa</td>
                <td>45</td>
                <td>5%</td>
                <td>2%</td>
                <td>20000</td>
            </tr>
            <tr>
                <td>12/12/2004</td>
                <td>tendrysoa</td>
                <td>45</td>
                <td>5%</td>
                <td>2%</td>
                <td>20000</td>
            </tr>
            <tr>
                <td>12/12/2004</td>
                <td>tendrysoa</td>
                <td>45</td>
                <td>5%</td>
                <td>2%</td>
                <td>20000</td>
            </tr>
            <tr>
                <td>12/12/2004</td>
                <td>tendrysoa</td>
                <td>45</td>
                <td>5%</td>
                <td>2%</td>
                <td>20000</td>
            </tr>
        </table>
    </div>

    <!-- js ny  -->
    <script defer>
        const ceuille=document.getElementsByClassName("ceuilleur");
        for(var i=0; i<ceuille.length; i++){
            ceuille[i].addEventListener("click",function(){
                var info=document.getElementById("ceuilleur_information");
                info.style.display="flex";

                

            });
        }
        const cancel=document.getElementById("cancel");
        cancel.addEventListener("click",function(){
            var info=document.getElementById("ceuilleur_information");
                info.style.display="none";
               
        });
    </script>