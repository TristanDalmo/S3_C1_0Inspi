document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form[action='./ControllerPartage.php']");
    const generateFileButton = document.getElementById("generateFile");

    form.addEventListener("submit", function (event) {
        // Récupérer le format choisi
        const fileFormat = document.querySelector('input[name="file_format"]:checked');

        if (!fileFormat) {
            // Bloquer si aucun format n'est sélectionné
            event.preventDefault();
            alert("Veuillez sélectionner un format de fichier (PDF ou Word).");
            return;
        }

        // Modifier l'action en fonction du choix
        if (fileFormat.value === "pdf") {
            form.action = "generate_pdf.php";
        } else if (fileFormat.value === "word") {
            form.action = "generate_word.php";
        }
    });
});
