// Esto lo hice siguiendo los ejemplos de esta pagina.
// https://www.solvetic.com/tutoriales/article/1339-validaciones-con-bootstrap-validator/

// VALIDACION DE amarchivo.php

$('#altaymodificacion').bootstrapValidator({
    message: 'Este valor no es valido',

        feedbackIcons: {

            valid: 'fa fa-check',

            invalid: 'fa fa-hand-paper',

            validating: 'fa fa-circle'

        },

        fields: {

            acnombre: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar un nombre '

                    }

                }

            }, acdescripcion: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar una descripcion del archivo '

                    }

                }

            }

        }
});

// VALIDACION DE compartirarchivo.php

$('#compartirArchivo').bootstrapValidator({
        message: 'Este valor no es valido',
    
            feedbackIcons: {
    
                valid: 'fa fa-check',
    
                invalid: 'fa fa-hand-paper',
    
                validating: 'fa fa-circle'
    
            },
    
            fields: {
    
                acprotegidoclave: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar una '
    
                        }
    
                    }
    
                }
            }
    
});


$('#eliminarArchivo').bootstrapValidator({
            message: 'Este valor no es valido',
        
                feedbackIcons: {
        
                    valid: 'fa fa-check',
        
                    invalid: 'fa fa-hand-paper',
        
                    validating: 'fa fa-circle'
        
                },
        
                fields: {
        
                    motivodelete: {
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar un motivo '
        
                            }
        
                        }
        
                    }
        
                }
        
});


$('#eliminarArchivoCompartido').bootstrapValidator({
    message: 'Este valor no es valido',

        feedbackIcons: {

            valid: 'fa fa-check',

            invalid: 'fa fa-hand-paper',

            validating: 'fa fa-circle'

        },

        fields: {

            motivodelete: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar un motivo '

                    }

                }

            }

        }

});


$('#login').bootstrapValidator({
                message: 'Este valor no es valido',
            
                    feedbackIcons: {
            
                        valid: 'fa fa-check',
            
                        invalid: 'fa fa-hand-paper',
            
                        validating: 'fa fa-circle'
            
                    },
            
                    fields: {
            
                        uslogin: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: 'Debe ingresar un nombre de usuario'
            
                                }
            
                            }
            
                        },usclave: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: 'Debe ingresar una clave '
            
                                }
            
                            }
            
                        }
                    }
 
});

$('#registro').bootstrapValidator({
    message: 'Este valor no es valido',

        feedbackIcons: {

            valid: 'fa fa-check',

            invalid: 'fa fa-hand-paper',

            validating: 'fa fa-circle'

        },

        fields: {

            usnombre: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar su nombre'

                    }, regexp: {
                        
                        regexp: /[a-z&A-Z]+$/,
   
                        message: 'El campo no debe contener números'
   
                    }

                }

            },usapellido: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar su apellido'

                    }

                }, regexp: {
                        
                    regexp: /[a-z&A-Z]+$/,

                    message: 'El campo no debe contener números'

                }

            },uslogin: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar un nombre de usuario '

                    }

                }

            },usclave: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar una clave '

                    }, regexp: {
                        
                        regexp: /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d).*$/,

                        message: 'la contraseña debe tener al menos 8 caracteres <br> la contraseña debe tener numeros y letras (mayusculas y minusculas)'
                    }

                }

            }
        }

});