import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**", "../fonts/**"]);


const buttons = document.querySelectorAll('.cancel-button');
buttons.forEach(button => {
    button.addEventListener("click", (event) => {
        event.preventDefault();
        const dataTitle = button.getAttribute('data-item-title');
        const modal = document.getElementById('deleteModal');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
        const title = document.getElementById('modal-item-title');
        title.textContent = dataTitle;
        const buttonDelete = modal.querySelector('button.btn-primary');
        buttonDelete.addEventListener("click", (event) => {
            button.parentElement.submit();
        })
    });
});

const prewiewImage = document.getElementById("image");
prewiewImage.addEventListener("change", (event) =>{
    let oFReader = new FileReader();
    oFReader-readAsDataURL(prewiewImage.files[0]);
    oFReader.onload = function (oFREvent){
        document.getElementById("image-preview").src = oFREvent.target.result;
    }
})
