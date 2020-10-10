// Este archivo JS contiene funciones usadas a lo largo de las distintas funciones de la pagina.

/* Summernote.org */

$('#summernote').summernote({
    placeholder: 'Esta es una descripción genérica, si lo necesita la puede cambiar.',
    tabsize: 2,
    height: 100
});




/* Entrega parte 2:

    CheckBox para seleccionar que se debe proteger con contraseña

Un Campo para cargar la contraseña en caso que se seleccione esta opción. 

*/
$('#password').keyup(function (e) {
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");
    if (false == enoughRegex.test($(this).val())) {
        $('#passstrength').html('Más caracteres.');
    } else if (strongRegex.test($(this).val())) {
        $('#passstrength').className = 'ok';
        $('#passstrength').html('Fuerte!');
    } else if (mediumRegex.test($(this).val())) {
        $('#passstrength').className = 'alert';
        $('#passstrength').html('Media!');
    } else {
        $('#passstrength').className = 'error';
        $('#passstrength').html('Débil!');
    }
    return true;
});



    /* HABILITAR O DESHABILITAR CLAVE */
    // Le doy a la variable el valor del checkbox
    var determine = document.getElementById("proteger");
    // Según el valor del checkbox me va a habilitar o deshabilitar el input para poner la clave
    var disableCheckboxConditioned = function () {
        if (determine.checked) {
            document.getElementById("password").disabled = false;
        } else {
            document.getElementById("password").disabled = true;
        }
    }
    // Activar la funcion con un click
    determine.onclick = disableCheckboxConditioned;
    disableCheckboxConditioned();


/* 
    Entrega Parte 3: 
    Consigna: El icono, debería ser sugerido teniendo en cuenta la extensión del archivo seleccionado.
    Todo esto usado JavaScript.

*/

/* NOMBRE Y TIPO DE ARCHIVO */
function myFunction() {
    var x = document.getElementById("archivo");
    //alert(x);
    //Colocamos el nombre del archivo
    document.getElementById("archivoName").value = x.files[0].name;

    //Seleccionamos el tipo de archivo
    var nombreArchivo = x.files[0].name;
    //alert(nombreArchivo);
    var extension = getFileExtension(nombreArchivo);
    checkTipoArchivo(extension);
}

/* OBTENEMOS TIPO ARCHIVO */
function getFileExtension(filename) {
    var ext = filename.split('.').pop();
    return ext;
}

/* ACTIVAMOS EL TIPO DE ARCHIVO */
function checkTipoArchivo(extension) {
    if (extension == "jpg" || extension == "png" || extension == "gif" || extension == "tiff" || extension == "jpeg" || extension == "bmp" || extension == "webp") {
        $("#icono-img").prop("checked", true);
        $("#icono-zip").prop("checked", false);
        $("#icono-doc").prop("checked", false);
        $("#icono-pdf").prop("checked", false);
        $("#icono-xls").prop("checked", false);
    } else if (extension == "zip" || extension == "rar" || extension == "bin" || extension == "gz" || extension == "tar") {
        $("#icono-img").prop("checked", false);
        $("#icono-zip").prop("checked", true);
        $("#icono-doc").prop("checked", false);
        $("#icono-pdf").prop("checked", false);
        $("#icono-xls").prop("checked", false);
    } else if (extension == "docx" || extension == "doc" || extension == "odt" || extension == "txt" || extension == "rtf" || extension == "dot" || extension == "dotm") {
        $("#icono-img").prop("checked", false);
        $("#icono-zip").prop("checked", false);
        $("#icono-doc").prop("checked", true);
        $("#icono-pdf").prop("checked", false);
        $("#icono-xls").prop("checked", false);
    } else if (extension == "pdf") {
        $("#icono-img").prop("checked", false);
        $("#icono-zip").prop("checked", false);
        $("#icono-doc").prop("checked", false);
        $("#icono-pdf").prop("checked", true);
        $("#icono-xls").prop("checked", false);
    } else if (extension == "xls" || extension == "xlsx" || extension == "xlsm" || extension == "xltx" || extension == "xlt" || extension == "ods") {
        $("#icono-img").prop("checked", false);
        $("#icono-zip").prop("checked", false);
        $("#icono-doc").prop("checked", false);
        $("#icono-pdf").prop("checked", false);
        $("#icono-xls").prop("checked", true);
    }
}

/* GENERAR HASH */
function generarHash() {
    //Elijo un numero random
    var numeroRandom = Math.random() * (100000 - 1);
    var numeroEntero = round(numeroRandom);
    //var nombre = document.getElementById("customFileLang");
    //var nombreArchivo = nombre.files[0].name;
    var dias = document.getElementById("diasCompartido").value;
    var descargas = document.getElementById("descargas").value;

    if (dias == 0 && descargas == 0) {
        var hash = "9007199254740991"; 
    }else{
        var cadena = "";
        //cadena += dias+descargas+nombreArchivo;
        cadena += dias+descargas+numeroEntero;
        var hash = md5(cadena);
    }

    document.getElementById("link").value = hash;
}