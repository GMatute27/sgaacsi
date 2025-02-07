// File upload functionality
const fileUpload = document.querySelector('.file-upload');
const fileInput = document.querySelector('#file-input');
const deleteButton = document.querySelector('#delete-file');
const fileNameDisplay = fileUpload.querySelector('p');

fileUpload.addEventListener('click', () => fileInput.click());

fileInput.addEventListener('change', function() {
    const fileName = this.files[0]?.name;
    if (fileName) {
        fileNameDisplay.textContent = `Archivo seleccionado: ${fileName}`;
        deleteButton.style.display = 'inline-block';
    } else {
        resetFileUpload();
    }
});

deleteButton.addEventListener('click', function() {
    fileInput.value = '';
    resetFileUpload();
});

function resetFileUpload() {
    fileNameDisplay.textContent = 'Arrastra tu archivo aquí o haz clic para seleccionar';
    deleteButton.style.display = 'none';
}
const textarea = document.querySelector('textarea');
const charCount = document.querySelector('.char-count');

textarea.addEventListener('input', function() {
    const remaining = 300 - this.value.length;
    charCount.textContent = `${remaining} caracteres restantes`;
});
