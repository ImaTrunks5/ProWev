function habilitarDis() //Función para habilitar el input de discapacidad al seleccionar que se tiene una discapacidad
{
    let InputDis = document.getElementById("floatingDiscapacidad");
    /* let RadioNo = document.getElementById("noRadio"); */
    let RadioSi = document.getElementById("siRadio");

    if (RadioSi.checked) 
    {
        InputDis.disabled = false;
    } else {
        InputDis.disabled = true;
    }
}

function habilitarNomEsc() //Función para habilitar el input Nombre Escuela al seleccionar otra escuela
{
    let selectEsc = document.getElementById("floatingEscP");
    let InputNomEsc = document.getElementById("floatingNomEsc");
    let ValorEsc = selectEsc.value;

    if (ValorEsc == "Otros") 
    {
        InputNomEsc.disabled = false;
    } else {
        InputNomEsc.disabled = true;
    }
}