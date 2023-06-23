const botonesEditar = document.querySelectorAll('.btn-success');
const botonesEliminar = document.querySelectorAll('.btn-danger');
const formEditar = document.querySelector('#form-edit');
const formEliminar = document.querySelector('#form-delete');
console.log(formEditar);
let formData = new FormData(formEditar);
//console.log(formData.keys()); 

const enviarDatos = (e)=>{
    //console.log(e.target.dataset.idsalon);
    //let id = e.target.dataset.idsalon;
    let parent = e.target.parentElement.parentElement.parentElement.parentElement;
    console.log(parent);
   let inputs = formEditar.querySelectorAll('input');
   let textarea = formEditar.querySelector('textarea');
   console.log(inputs);
   data = JSON.parse(parent.dataset.info);
    inputs[0].value = data[0];
    inputs[1].value = data[2];
    textarea.value = data[1];

    let formData = new FormData(formEditar);
    //console.log(formData.entries());
}
const enviarId = (e)=>{
    id = e.target.dataset.idsalon;
    console.log(id);
   const input = formEliminar.querySelector('input[name=id_salon');
   console.log(input);
   input.value = JSON.parse(id);

}
botonesEditar.forEach(btn =>{
    btn.addEventListener('click',enviarDatos);
})
botonesEliminar.forEach(btn =>{
    btn.addEventListener('click',enviarId);
})
