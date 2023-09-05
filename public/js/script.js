
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


    const bookFileInput = document.getElementById('bookFileInput');
});




if (window.location.href.includes('http://localhost/Pucuk-Pena/public/Contribute')) {


const coverFileInput = document.getElementById('coverFileInput');
const bookFileInputLabel = document.querySelector('.fileInputLabel[for="bookFileInput"]');
const coverFileInputLabel = document.querySelector('.fileInputLabel[for="coverFileInput"]');

bookFileInput.addEventListener('change', (event) => {
  const selectedFiles = event.target.files;
  
  if (selectedFiles.length > 0) {
    bookFileInputLabel.textContent = selectedFiles[0].name;
  } else {
    bookFileInputLabel.textContent = 'Masukkan Buku';
  }
});

coverFileInput.addEventListener('change', (event) => {
  const selectedFiles = event.target.files;
  
  if (selectedFiles.length > 0) {
    coverFileInputLabel.textContent = selectedFiles[0].name;
  } else {
    coverFileInputLabel.textContent = 'Masukkan Sampul';
  }
});

}

