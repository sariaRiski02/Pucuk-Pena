const coverFileInput = document.getElementById('coverFileInput');
const bookFileInputLabel = document.querySelector('.fileInputLabel[for="bookFileInput"]');
const coverFileInputLabel = document.querySelector('.fileInputLabel[for="coverFileInput"]');
const bookFileInput = document.getElementById('bookFileInput');
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