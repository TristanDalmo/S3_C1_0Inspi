
function main(){
    let img = document.getElementById("fileInput");
    img.onclick=ajouterImage;


}
function  ajouterImage ()  {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader(); // Utilise FileReader pour lire l'image

        // Quand l'image est chargée
        reader.onload = function(event) {
            // Création d'un élément <img> pour afficher l'image
            const imgElement = document.createElement('img');
            imgElement.src = event.target.result; // Définit la source de l'image
            imagePreview.innerHTML = ''; // Vide l'ancien contenu
            imagePreview.appendChild(imgElement); // Ajoute la nouvelle image
        };
    }
    return

}
window.onload = main;