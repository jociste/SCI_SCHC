/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function validarFuncionaria() {
    if (Rut(document.getElementById('runFuncionaria').value)) {
        if (document.getElementById('nombres').value != "") {
            if (document.getElementById('apellidos').value != "") {
                if (document.getElementById('fechaNacimiento').value != "") {
                    if (document.getElementById('profesion').value != "") {
                        if (document.getElementById('direccion').value != "") {
                            var telefono = document.getElementById('telefono').value;
                            if (telefono != "" && telefono.length > 5) {
                                if (!isNaN(telefono)) {
                                    var cadenaPass = document.getElementById('clave').value;
                                    if (cadenaPass.length >= 4) {
                                        if (cadenaPass == document.getElementById('claveRepetida').value) {
                                            return true;
                                        } else {
                                            $.messager.alert("Alerta", "Las contraseñas no coinciden");
                                        }
                                    } else {
                                        $.messager.alert("Alerta", "La contraseña debe tener minimo 4 caracteres");
                                    }
                                } else {
                                    $.messager.alert("Alerta", "El telefono contiene caracteres no validos");
                                }
                            } else {
                                $.messager.alert("Alerta", "Debe ingresar una telefono de contacto con al menos 6 digitos");
                            }
                        } else {
                            $.messager.alert("Alerta", "Debe ingresar una direccion");
                        }
                    } else {
                        $.messager.alert("Alerta", "Debe ingresar una profesion");
                    }
                } else {
                    $.messager.alert("Alerta", "Debe ingresar una fecha de nacimiento");
                }
            } else {
                $.messager.alert("Alerta", "Debe ingresar sus apellidos");
            }
        } else {
            $.messager.alert("Alerta", "Debe ingresar sus nombres");
        }
    } else {
        $.messager.alert("Alerta", "El run ingresado no es valido");
    }
    return false;
}
function validarCargoNivelFuncionaria() {
    if (document.getElementById('idCargo').value != "") {
        if (document.getElementById('idNivel').value != "") {
            if (validaFechasCargo() && validaFechasNivel()) {
                return true;
            }
        } else {
            $.messager.alert("Alerta", "Debe ingresar un Nivel");
        }
    } else {
        $.messager.alert("Alerta", "Debe ingresar un cargo");
    }
    return false;
}
function validaFechasNivel() {
    var fechaInicioNivel = document.getElementById('fechaInicioNivel').value;
    var fechaTerminoNivel = document.getElementById('fechaTerminoNivel').value;
    var deshabilitaFechaNivel = document.getElementById("deshabilitaFecha2").checked;
    var hoy = fechaActual();
    if (!(deshabilitaFechaNivel == true)) {
        if (fechaInicioNivel != "") {
            if (fechaTerminoNivel != "" && fechaTerminoNivel != null) {
                if (fechaTerminoNivel >= hoy && fechaTerminoNivel > fechaInicioNivel) {
                    return true;
                } else {
                    $.messager.alert("Alerta", "Debe ingresar una fecha de término del nivel valida");
                }
            } else {
                $.messager.alert("Alerta", "Debe ingresar una fecha de término en el nivel o seleccionar la opción 'indefinido'");
            }
        } else {
            $.messager.alert("Alerta", "Debe ingresar una fecha de inicio en el nivel");
        }
    } else {
        return true;
    }
    return false;
}
function validaFechasCargo() {
    var fechaInicio = document.getElementById('fechaInicio').value;
    var fechaTermino = document.getElementById('fechaTermino').value;
    var deshabilitaFechaCargo = document.getElementById("deshabilitaFecha").checked;
    var hoy = fechaActual();
    if (!(deshabilitaFechaCargo == true)) {
        if (fechaInicio != "") {
            if (fechaTermino != "" && fechaTermino != null) {
                if (fechaTermino >= hoy && fechaTermino > fechaInicio) {
                    return true;
                } else {
                    $.messager.alert("Alerta", "Debe ingresar una fecha de término del cargo valida.");
                }
            } else {
                $.messager.alert("Alerta", "Debe ingresar una fecha de término en el cargo o seleccionar la opción 'indefinido'");
            }
        } else {
            $.messager.alert("Alerta", "Debe ingresar una fecha de inicio del cargo");
        }
    } else {
        return true;
    }
    return false;
}
function deshabilitaCampo() {
    if (document.getElementById("deshabilitaFecha").checked == true) {
        document.getElementById("fechaTermino").disabled = 'disabled';
        document.getElementById("fechaTermino").value = '';
    } else {
        document.getElementById("fechaTermino").disabled = false;
    }
}

function deshabilitaCampo2() {
    if (document.getElementById("deshabilitaFecha2").checked == true) {
        document.getElementById("fechaTerminoNivel").disabled = 'disabled';
        document.getElementById("fechaTerminoNivel").value = '';
    } else {
        document.getElementById("fechaTerminoNivel").disabled = false;
    }
}

function eliminarCaracteres() {
    var aux = String(document.getElementById("runFuncionaria").value);
    aux = aux.replace('.', '');
    aux = aux.replace('.', '');
    aux = aux.replace('-', '');
    aux = aux.replace('K', '0');
    aux = aux.replace('k', '0');
    document.getElementById("runFuncionaria").value = aux;
}
function fechaActual() {
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth() + 1; //hoy es 0!
    var yyyy = hoy.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    hoy = yyyy + "-" + mm + "-" + dd;
    return hoy;
}

