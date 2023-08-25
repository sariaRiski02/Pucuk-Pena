document.addEventListener('DOMContentLoaded', () => {
    const nav = document.querySelector("nav");
    const menuIcon = document.querySelector("input[type='checkbox']");

    menuIcon.addEventListener('click', () => {
        if (menuIcon.checked) {
            nav.classList.add("respon-nav");
        } else {
            nav.classList.remove("respon-nav");
        }
    });
});

const fileInput = document.getElementById('fileInput');
const fileInputLabel = document.getElementById('fileInputLabel');

fileInput.addEventListener('change', (event) => {
  const selectedFiles = event.target.files;
  
  if (selectedFiles.length > 0) {
    fileInputLabel.textContent = selectedFiles[0].name;
  } else {
    fileInputLabel.textContent = 'Pilih File';
  }
});




