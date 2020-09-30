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
        
                    },password: {
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar una clave '
        
                            }
        
                        }
        
                    }
        
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
            
                                notEmpty: {
            
                                    message: 'Debe ingresar una clave '
            
                                }
            
                            }
            
                        },hash: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: ' No olvide generar el hash '
            
                                }
            
                            }
            
                        }
            
                    }
            
});