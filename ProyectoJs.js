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

/* function habilitarAlcOMun() //Función para habilitar el input Alcaldía o Municipio dependiendo si se selecciona CDMX
{
    let selectEst = document.getElementById("floatingEntidadFederativa");
    let selectAl = document.getElementById("floatingAlcaldia");
    let InputMun = document.getElementById("floatingMunAl");

    let ValorEst = selectEst.value;

    if (ValorEst == "CiudadDeMexico") 
    {
        selectAl.disabled = false;
        InputMun.disabled = true;    
    } else {
        selectAl.disabled = true;
        InputMun.disabled = false;
    }
} */