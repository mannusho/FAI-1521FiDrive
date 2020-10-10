// Esto lo hice siguiendo los ejemplos de esta pagina.
// https://www.solvetic.com/tutoriales/article/1339-validaciones-con-bootstrap-validator/

$('#delfile').bootstrapValidator({
    message: 'Este valor no es valido',

        feedbackIcons: {

            valid: 'fa fa-check',

            invalid: 'fa fa-hand-paper',

            validating: 'fa fa-circle'

        },

        fields: {

            archivoCompartido: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar un nombre '

                    }

                }

            }, motivo: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar un motivo '

                    }

                }

            }

        }
});

$('#delShaFile').bootstrapValidator({
        message: 'Este valor no es valido',
    
            feedbackIcons: {
    
                valid: 'fa fa-check',
    
                invalid: 'fa fa-hand-paper',
    
                validating: 'fa fa-circle'
    
            },
    
            fields: {
    
                archivoCompartido: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar un nombre '
    
                        }
    
                    }
    
                },cantidad: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar la cantidad de veces que se compartio '
    
                        }
    
                    }
    
                },motivo: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar un motivo '
    
                        }
    
                    }
    
                }
    
            }
    
});

<<<<<<< HEAD
// ALTA Y MODIFICACION DE UN ARCHIVO.
=======
>>>>>>> bf344e43dc3e6fce5317cbd27263f2652187ecf4

$('#altaymod').bootstrapValidator({
            message: 'Este valor no es valido',
        
                feedbackIcons: {
        
                    valid: 'fa fa-check',
        
                    invalid: 'fa fa-hand-paper',
        
                    validating: 'fa fa-circle'
        
                },
        
                fields: {
        
                    archivoName: {
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar un nombre '
        
                            }
        
                        }
        
                    },descripcion: {
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar una descripcion '
        
                            }
        
                        }
        
<<<<<<< HEAD
                    } /*,password: {
=======
                    },password: {
>>>>>>> bf344e43dc3e6fce5317cbd27263f2652187ecf4
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar una clave '
        
                            }
        
                        }
        
<<<<<<< HEAD
                    }*/
=======
                    }
>>>>>>> bf344e43dc3e6fce5317cbd27263f2652187ecf4
        
                }
        
});


$('#shareFile').bootstrapValidator({
                message: 'Este valor no es valido',
            
                    feedbackIcons: {
            
                        valid: 'fa fa-check',
            
                        invalid: 'fa fa-hand-paper',
            
                        validating: 'fa fa-circle'
            
                    },
            
                    fields: {
            
                        archivoCompartido: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: 'Debe ingresar un nombre '
            
                                }
            
                            }
            
                        },diasCompartido: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: 'Debe ingresar una cantidad de dias '
            
                                }
            
                            }
            
                        },password: {
            
                            validators: {
            
<<<<<<< HEAD
                                regexp: {
                                    
                                    regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[0-9]).{,6}$/,

                                    message: ' Su contraseña es debil pero valida, si quiere una contraseña mas fuerte intente que tenga mas de 6 caracteres '
                                
                                },  regexp: {
                                    
                                    regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[0-9]).{6,}$/,

                                    message: ' Su contraseña es normal pero valida, si quiere una contraseña mas fuerte intente que tenga algun simbolo '
                                
                                },  regexp: {
                                    
                                    regexp: /^(?=.*[0-9])(?=.*[a-z])(?=.*[!@#$%^&*]){6,}$/,

                                    message: ' ¡Su contraseña es fuerte! ¡muy bien! '
                                }, notEmpty: {
=======
                                notEmpty: {
>>>>>>> bf344e43dc3e6fce5317cbd27263f2652187ecf4
            
                                    message: 'Debe ingresar una clave '
            
                                }
<<<<<<< HEAD
                            }
                        },hash: {
                                
=======
            
                            }
            
                        },hash: {
            
>>>>>>> bf344e43dc3e6fce5317cbd27263f2652187ecf4
                            validators: {
            
                                notEmpty: {
            
                                    message: ' No olvide generar el hash '
            
                                }
            
                            }
            
                        }
            
                    }
<<<<<<< HEAD

=======
>>>>>>> bf344e43dc3e6fce5317cbd27263f2652187ecf4
            
});