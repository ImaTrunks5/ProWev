function ValidarFormulario(){
    var Nombre= document.getElementById('Nombre').value;
    var errorNombre= document.getElementById('ErrorNombre');
    var NoBoleta= document.getElementById('No.Boleta').value;
    var errorNoBoleta= document.getElementById('errorNoBoleta');
    var Paterno= document.getElementById('ApPaterno').value;
    var errorPaterno= document.getElementById('errorApPaterno');
    var Materno= document.getElementById('ApMaterno').value;
    var errorMaterno= document.getElementById('errorApMaterno');
    var Telefono= document.getElementById('telefono').value;
    var errorTelefono= document.getElementById('errortelefono');
    var Curp= document.getElementById('CURP').value;
    var errorCurp= document.getElementById('errorCURP');

   
    var boletaReg=/^PE[0-9]{8}$|^[0-9]{10}$|^PP[0-9]{8}$/;
    var patReg=/^([A-Z]|[a-z])+(?:\s[A-Za-z]+)*\s?$/;
    var matReg=/^([A-Z]|[a-z])+(?:\s[A-Za-z]+)*\s?$/;
    var nomReg=/^([A-Z]|[a-z])+(?:\s[A-Za-z]+)*\s?$/;
    var telReg=/^[0-9]{10}$/;
    var curpReg=/^[A-Z]{4}[0-9]{6}[A-Z]{6}([A-Z]|[0-9]){2}$/;


    if(!boletaReg.test(NoBoleta)){
        errorNoBoleta.innerText='Por favor ingresa un número de boleta valido';
        return false;
    }else{
        errorNoBoleta.innerText='';
    }

    if (!nomReg.test(Nombre)) {
        errorNombre.textContent='Por favor ingresa un Nombre valido';      
        return false;
    } else {
        errorNombre.textContent='';
    }

    if (!patReg.test(Paterno)) {
        errorPaterno.textContent='Por favor ingresa un Apellido Paterno valido';
    
        return false;
    }else{
        errorPaterno.textContent='';  
    }

    if (!matReg.test(Materno)) {
        errorMaterno.textContent='Por favor ingresa un Apellido Materno valido';
        return false;
    } else {
        errorMaterno.textContent='';
    }

    if (!telReg.test(Telefono)) {
        errorTelefono.textContent='Por favor ingresa un número de telefono valido';
        return false;
    } else {
        errorTelefono.textContent='';
    }

    if (!curpReg.test(Curp)) {
        errorCurp.textContent='Por favor ingrese un curp valido';
        return false;
    } else {
        errorCurp.textContent='';
    }




    return true;
}