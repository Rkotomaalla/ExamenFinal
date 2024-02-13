
const fomulaire_cueillette = document.getElementById("form_cueillette");
const fomulaire_Depenses = document.getElementById("Depenses");

fomulaire_cueillette.addEventListener('submit', function (event) {
    event.preventDefault (); // annule l'ction par defaut
    insert_cueillette (fomulaire_cueillette);
});


function insert_cueillette (formulaire) {
    var xhr;
    try {
        xhr = new XMLHttpRequest ();
    } catch (error) { xhr = false; }
    var form_data = new FormData (formulaire); // on transforme le formulaire sous forme JSON

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status === 200) {
            var retour = JSON.parse(xhr.responseText);
            
        }
    }
    xhr.open ("POST", '../../pages/traitements/insert_cueillette.php');
    xhr.send (form_data);
}