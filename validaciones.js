function ValidarFormulario(){   
    var Nombre= document.getElementById('floatingNombre').value;
    var errorNombre= document.getElementById('errorNombre');
  
    var NoBoleta= document.getElementById('floatingBoleta').value;
    var errorNoBoleta= document.getElementById('errorNoBoleta');
   
    var Paterno= document.getElementById('floatingApPaterno').value;
    var errorPaterno= document.getElementById('errorApPaterno');
 
    var Materno= document.getElementById('floatingApMaterno').value;
    var errorMaterno= document.getElementById('errorApMaterno');

    var Telefono= document.getElementById('floatingTel').value;
 
    var errorTelefono= document.getElementById('errorTelefono');

    var Curp= document.getElementById('floatingCURP').value;
  
    var errorCurp= document.getElementById('errorCurp');

   
    let bandera=true;
   
    var boletaReg=/^PE[0-9]{8}$|^[0-9]{10}$|^PP[0-9]{8}$/;
    var patReg=/^([A-Z]|[a-z])+(?:\s[A-Za-z]+)*\s?$/;
    var matReg=/^([A-Z]|[a-z])+(?:\s[A-Za-z]+)*\s?$/;
    var nomReg=/^([A-Z]|[a-z])+(?:\s[A-Za-z]+)*\s?$/;
    var telReg=/^[0-9]{10}$/;
    var curpReg=/^[A-Z]{4}[0-9]{6}[A-Z]{6}([A-Z]|[0-9]){2}$/;

    /* alert("Antes de validaar boleta"); */
    
    if(!boletaReg.test(NoBoleta)){

        errorNoBoleta.innerText='Por favor ingresa un número de boleta valido';
        bandera=false;
    }else{
        errorNoBoleta.innerText='';
    }
    
    /* alert("despues de validaar boleta");
    alert("Antes de validaar nombre"); */
    
    if (!nomReg.test(Nombre)) {
        errorNombre.textContent='Por favor ingresa un Nombre valido';      
        bandera=false;
    } else {
        errorNombre.textContent='';
    }

    /* alert("despues de validaar nombre"); 
    alert("antes de validaar pat"); */

    if (!patReg.test(Paterno)) {
        errorPaterno.textContent='Por favor ingresa un Apellido Paterno valido';
        bandera=false;
    }else{
        errorPaterno.textContent='';  
    }

    //alert("despues de validaar pat");
    //alert("antes de validaar mat");
    
    if (!matReg.test(Materno)) {
        errorMaterno.textContent='Por favor ingresa un Apellido Materno valido';
        bandera=false;
    } else {
        errorMaterno.textContent='';
    }

    //alert("despues de validaar mat");
    //alert("antes de validaar tel");

    if (!telReg.test(Telefono)) {
        errorTelefono.textContent='Por favor ingresa un número de telefono valido';
        bandera=false;
    } else {
        errorTelefono.textContent='';
    }

    //alert("despues de validaar tel");
    //alert("antes de validaar curp");

    if (!curpReg.test(Curp)) {
        errorCurp.textContent='Por favor ingrese un curp valido';
        bandera=false;
    } else {
        errorCurp.textContent='';
    }

    //alert("despues de validaar curp");

    if (bandera===false) {
       alert("entre al if de bandera");
        return false;
    }

    //alert("estoy en el return true");
    return true;
}