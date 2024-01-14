function habilitarDis() //Función para habilitar el input de discapacidad al seleccionar que se tiene una discapacidad
{
    let InputDis = document.getElementById("floatingDiscapacidad");
    /* let RadioNo = document.getElementById("noRadio"); */
    let RadioOtra = document.getElementById("otraRadio");

    if (RadioOtra.checked) 
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

function abrirFormulario() {
    document.getElementById("formregistrar").style.display = "block";
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

/* function redirigirAPestaña() {
    // Activar la pestaña de contacto
   console.log('Cambiando a la pestaña de contacto');

    var myTab = new bootstrap.Tab(document.querySelector('#pestañaContacto'));
    myTab.show();
    document.body.scrollIntoView({
        behavior: 'smooth' 
    })
}

function redirigirAPestaña2() {
    // Activar la pestaña de contacto
    console.log('Cambiando a la pestaña de contacto');

    var myTab = new bootstrap.Tab(document.querySelector('#pestañaProcedencia'));
    myTab.show();
    document.body.scrollIntoView({
        behavior: 'smooth' 
    })
} */