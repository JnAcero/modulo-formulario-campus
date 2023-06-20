const selectPaises=document.querySelector('#pais');
console.log(selectPaises);

async function getPaises(){
    const url="https://restcountries.com/v3.1/all";
    const respuesta = (await fetch(url)).json();
    return respuesta;
}
const llenarSelectPaises = async ()=>{
    await getPaises()
   .then(respuesta =>{
   // console.log(respuesta);)
     for(let i=0;i<=respuesta.length;i++){
         const optionPais = document.createElement('option');
         optionPais.value=respuesta[i].name.common;
         optionPais.textContent =respuesta[i].name.common;
         selectPaises.appendChild(optionPais);
     }
   })
}
llenarSelectPaises();