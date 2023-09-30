const inputcover = document.getElementById("change_cover");
const lebelcover = document.querySelector(".label-cover[for=change_cover]");

const bookFileInputLabel = document.querySelector('.fileInputLabel[for="bookFileInput"]');


inputcover.addEventListener('change', (event) => {
  const selectedFiles = event.target.files;
  if (selectedFiles.length > 0) {
    lebelcover.textContent = selectedFiles[0].name;
  } else {
    lebelcover.textContent = 'Masukkan Sampul';
  }
});


const photoInput = document.getElementById('change_cover');
const photoPreview = document.getElementById('photoPreview');

photoInput.addEventListener('change', function() {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.onload = function(e) {
            photoPreview.src = e.target.result;
        };

        reader.readAsDataURL(file);
    }
});