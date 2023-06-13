import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
  '../img/**'
])



window.addEventListener("load", function () {

  setTimeout(function () {
    document.querySelector(".bio").classList.add("show-animation-right");
  }, 1500);

  setTimeout(function () {
    document.querySelector(".code").classList.add("show-animation-left-2");
  }, 2000);

  setTimeout(function () {
    document.querySelector(".social").classList.add("show-animation-right-2");
  }, 2500);
});



const buttons = document.querySelectorAll('.deletBtn');
const confirmDeleteDiv = document.getElementById('confirmDelete');
const confirmBtn = document.getElementById('confirmBtn');
const cancelBtn = document.getElementById('cancelBtn');

buttons.forEach(element => {
  element.addEventListener('click', (e) => {
    e.preventDefault();  // evita il comportamento di default del form cioe l'invio dei dati e refresh della pagina
    confirmDeleteDiv.classList.add('d-block');

    confirmBtn.addEventListener('click', () => {
      element.parentElement.submit();
    });

    cancelBtn.addEventListener('click', () => {
      confirmDeleteDiv.classList.remove('d-block');
    });
  })
});


// funzione per far scomparire il messaggio progressivamente
const messageElement = document.getElementById('final-message');

function disappear() {
  messageElement.classList.add('hide');

  setTimeout(() => {
    messageElement.classList.add('hidden');
  }, 5000);
}


// preview immagine


const imageInput = document.getElementById("image-input");
const imagePreview = document.getElementById("image-preview");
const imageActual = document.getElementById("actual-image");

if (imageInput && imagePreview) {

  imageInput.addEventListener("change", function () {
    
    const selectedFile = this.files[0]; //files è un array di file, prendo il primo
    const reader = new FileReader();
    console.log("prova");
    
    reader.addEventListener("load", function () {
      console.log("prova");
      imagePreview.src = reader.result;
      imagePreview.classList.remove("d-none");
      imagePreview.classList.add("d-block");
      imageActual.classList.add("d-none");
    })
    
    reader.readAsDataURL(selectedFile);//converte il file in una stringa di testo
  })

}


// richiamo funzione per far scomparire il messaggio progressivamente
disappear();



