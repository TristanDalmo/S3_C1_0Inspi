
// #region Dropzone

async function Main() {
    const dropContainer = document.getElementById("dropcontainer");
    const fileInput = document.getElementById("Documents");
    
    dropContainer.addEventListener("dragover", (e) => {
      // prevent default to allow drop
      e.preventDefault();
    }, false);
    
    dropContainer.addEventListener("dragenter", () => {
      dropContainer.classList.add("drag-active");
    });
    
    dropContainer.addEventListener("dragleave", () => {
      dropContainer.classList.remove("drag-active");
    });
    
    dropContainer.addEventListener("drop", (e) => {
      e.preventDefault();
      dropContainer.classList.remove("drag-active");
      fileInput.files = e.dataTransfer.files;
    });
}
window.onload = Main;

// #endregion