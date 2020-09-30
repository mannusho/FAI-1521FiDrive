// Esto lo hice siguiendo los ejemplos de esta pagina.
// https://www.solvetic.com/tutoriales/article/1339-validaciones-con-bootstrap-validator/

$('#tp1ej1').bootstrapValidator({
    message: 'Este valor no es valido',

        feedbackIcons: {

            valid: 'fa fa-check',

            invalid: 'fa fa-hand-paper',

            validating: 'fa fa-circle'

        },

        fields: {

            numero: {

                validators: {

                    notEmpty: {

                        message: 'Debe ingresar un numero '

                    }, regexp: {

                        regexp: /^[0-9]+$/,
   
                        message: 'El campo solo debe contener números'
   
                    }

                }

            }
        }

    });

    $('#tp1ej2').bootstrapValidator({
        message: 'Este valor no es valido',
    
         feedbackIcons: {
    
             valid: 'fas fa-check-circle',
    
             invalid: 'fas fa-exclamation-circle',
    
             validating: 'fa fa-times-circle'
             
         },
    
            fields: {
    
                lunes: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar un numero '
    
                        }, regexp: {
    
                            regexp: /^[0-9]+$/,
       
                            message: 'El campo solo debe contener números'
       
                        }
    
                    }
    
                },
                martes: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar un numero '
    
                        }, regexp: {
    
                            regexp: /^[0-9]+$/,
       
                            message: 'El campo solo debe contener números'
       
                        }
    
                    }
    
                },
                miercoles: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar un numero '
    
                        }, regexp: {
    
                            regexp: /^[0-9]+$/,
       
                            message: 'El campo solo debe contener números'
       
                        }
    
                    }
    
                },
                jueves: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar un numero '
    
                        }, regexp: {
    
                            regexp: /^[0-9]+$/,
       
                            message: 'El campo solo debe contener números'
       
                        }
    
                    }
    
                },
                viernes: {
    
                    validators: {
    
                        notEmpty: {
    
                            message: 'Debe ingresar un numero '
    
                        }, regexp: {
    
                            regexp: /^[0-9]+$/,
       
                            message: 'El campo solo debe contener números'
       
                        }
    
                    }
    
                }
            }
    
        });

        $('#tp1ej3').bootstrapValidator({
            message: 'Este valor no es valido',
        
             feedbackIcons: {
        
                 valid: 'fas fa-check-circle',
        
                 invalid: 'fas fa-exclamation-circle',
        
                 validating: 'fa fa-times-circle'
                 
             },
        
                fields: {
        
                    nombre: {
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar un nombre'
        
                            }, regexp: {
        
                                regexp: /[a-z&A-Z]+$/,
           
                                message: 'El campo no debe contener números'
           
                            }
        
                        }
        
                    },
                    apellido: {
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar un apellido'
        
                            }, regexp: {
        
                                regexp: /[a-z&A-Z]+$/,
           
                                message: 'El campo no debe contener números'
           
                            }
        
                        }
        
                    },
                    edad: {
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar una edad'
        
                            }, regexp: {
        
                                regexp: /[0-9]+$/,
           
                                message: 'El campo solo debe contener números'
           
                            }
        
                        }
        
                    },
                    direccion: {
        
                        validators: {
        
                            notEmpty: {
        
                                message: 'Debe ingresar una direccion'
        
                            }
        
                        }
        
                    }
                }
        
            });

            $('#tp1ej3').bootstrapValidator({
                message: 'Este valor no es valido',
            
                 feedbackIcons: {
            
                     valid: 'fas fa-check-circle',
            
                     invalid: 'fas fa-exclamation-circle',
            
                     validating: 'fa fa-times-circle'
                     
                 },
            
                    fields: {
            
                        nombre: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: 'Debe ingresar un nombre'
            
                                }, regexp: {
            
                                    regexp: /[a-z&A-Z]+$/,
               
                                    message: 'El campo no debe contener números'
               
                                }
            
                            }
            
                        },
                        apellido: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: 'Debe ingresar un apellido'
            
                                }, regexp: {
            
                                    regexp: /[a-z&A-Z]+$/,
               
                                    message: 'El campo no debe contener números'
               
                                }
            
                            }
            
                        },
                        edad: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: 'Debe ingresar una edad'
            
                                }, regexp: {
            
                                    regexp: /[0-9]+$/,
               
                                    message: 'El campo solo debe contener números'
               
                                }
            
                            }
            
                        },
                        direccion: {
            
                            validators: {
            
                                notEmpty: {
            
                                    message: 'Debe ingresar una direccion'
            
                                }
            
                            }
            
                        }
                    }
            
                });

                // Es exactamente igual a tp1ej3 pero lo dejo por las dudas.
                $('#tp1ej4').bootstrapValidator({
                    message: 'Este valor no es valido',
                
                     feedbackIcons: {
                
                         valid: 'fas fa-check-circle',
                
                         invalid: 'fas fa-exclamation-circle',
                
                         validating: 'fa fa-times-circle'
                         
                     },
                
                        fields: {
                
                            nombre: {
                
                                validators: {
                
                                    notEmpty: {
                
                                        message: 'Debe ingresar un nombre'
                
                                    }, regexp: {
                
                                        regexp: /[a-z&A-Z]+$/,
                   
                                        message: 'El campo no debe contener números'
                   
                                    }
                
                                }
                
                            },
                            apellido: {
                
                                validators: {
                
                                    notEmpty: {
                
                                        message: 'Debe ingresar un apellido'
                
                                    }, regexp: {
                
                                        regexp: /[a-z&A-Z]+$/,
                   
                                        message: 'El campo no debe contener números'
                   
                                    }
                
                                }
                
                            },
                            edad: {
                
                                validators: {
                
                                    notEmpty: {
                
                                        message: 'Debe ingresar una edad'
                
                                    }, regexp: {
                
                                        regexp: /[0-9]+$/,
                   
                                        message: 'El campo solo debe contener números'
                   
                                    }
                
                                }
                
                            },
                            direccion: {
                
                                validators: {
                
                                    notEmpty: {
                
                                        message: 'Debe ingresar una direccion'
                
                                    }
                
                                }
                
                            }
                        }
                
                    });
                    $('#tp1ej6').bootstrapValidator({
                        message: 'Este valor no es valido',
                    
                         feedbackIcons: {
                    
                             valid: 'fas fa-check-circle',
                    
                             invalid: 'fas fa-exclamation-circle',
                    
                             validating: 'fa fa-times-circle'
                             
                         },
                    
                            fields: {
                    
                                nombre: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe ingresar un nombre'
                    
                                        }, regexp: {
                    
                                            regexp: /[a-z&A-Z]+$/,
                       
                                            message: 'El campo no debe contener números'
                       
                                        }
                    
                                    }
                    
                                },
                                apellido: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe ingresar un apellido'
                    
                                        }, regexp: {
                    
                                            regexp: /[a-z&A-Z]+$/,
                       
                                            message: 'El campo no debe contener números'
                       
                                        }
                    
                                    }
                    
                                },
                                edad: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe ingresar una edad'
                    
                                        }, regexp: {
                    
                                            regexp: /[0-9]+$/,
                       
                                            message: 'El campo solo debe contener números'
                       
                                        }
                    
                                    }
                    
                                },
                                direccion: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe ingresar una direccion'
                    
                                        }
                    
                                    }
                    
                                },
                                estudio: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe seleccionar alguna opcion'
                    
                                        }
                    
                                    }
                    
                                },
                                sexo: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe seleccionar alguna opcion'
                    
                                        }
                    
                                    }
                    
                                }
                            }
                    
                        });
                        $('#tp1ej5').bootstrapValidator({
                            message: 'Este valor no es valido',
                        
                             feedbackIcons: {
                        
                                 valid: 'fas fa-check-circle',
                        
                                 invalid: 'fas fa-exclamation-circle',
                        
                                 validating: 'fa fa-times-circle'
                                 
                             },
                        
                                fields: {
                        
                                    nombre: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar un nombre'
                        
                                            }, regexp: {
                        
                                                regexp: /[a-z&A-Z]+$/,
                           
                                                message: 'El campo no debe contener números'
                           
                                            }
                        
                                        }
                        
                                    },
                                    apellido: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar un apellido'
                        
                                            }, regexp: {
                        
                                                regexp: /[a-z&A-Z]+$/,
                           
                                                message: 'El campo no debe contener números'
                           
                                            }
                        
                                        }
                        
                                    },
                                    edad: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar una edad'
                        
                                            }, regexp: {
                        
                                                regexp: /[0-9]+$/,
                           
                                                message: 'El campo solo debe contener números'
                           
                                            }
                        
                                        }
                        
                                    },
                                    direccion: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar una direccion'
                        
                                            }
                        
                                        }
                        
                                    },
                                    estudio: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe seleccionar alguna opcion'
                        
                                            }
                        
                                        }
                        
                                    },
                                    sexo: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe seleccionar alguna opcion'
                        
                                            }
                        
                                        }
                        
                                    },
                                    // No es posible validar los checkbox
                                deporte: {
                        
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe seleccionar alguna opcion'
                    
                                        }
                    
                                    }
                    
                                }
                            }
                        
                    });


                    $('#tp1ej7').bootstrapValidator({
                        message: 'Este valor no es valido',
                    
                         feedbackIcons: {
                    
                             valid: 'fa fa-check',
                    
                             invalid: 'fa fa-hand-paper',
                    
                             validating: 'fa fa-circle'
                             
                         },
                    
                            fields: {
                    
                                valor1: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe ingresar un numero '
                    
                                        }, regexp: {
                    
                                            regexp: /^[0-9]+$/,
                       
                                            message: 'El campo solo debe contener números'
                       
                                        }
                    
                                    }
                    
                                },
                                valor2: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe ingresar un numero '
                    
                                        }, regexp: {
                    
                                            regexp: /^[0-9]+$/,
                       
                                            message: 'El campo solo debe contener números'
                       
                                        }
                    
                                    }
                    
                                },
                                op: {
                    
                                    validators: {
                    
                                        notEmpty: {
                    
                                            message: 'Debe seleccionar una operacion '
                    
                                        }
                    
                                    }
                    
                                }

                            }
                    
                        });

                        $('#tp1ej8').bootstrapValidator({
                            message: 'Este valor no es valido',
                        
                             feedbackIcons: {
                        
                                 valid: 'fa fa-check',
                        
                                 invalid: 'fa fa-hand-paper',
                        
                                 validating: 'fa fa-circle'
                                 
                             },
                        
                                fields: {
                        
                                    age: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar un numero '
                        
                                            }, regexp: {
                        
                                                regexp: /^[0-9]+$/,
                           
                                                message: 'El campo solo debe contener números'
                           
                                            }
                        
                                        }
                        
                                    },
                                    estudiante: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe seleccionar una opcion '
                        
                                            }
                        
                                        }
                        
                                    }
    
                                }
                        
                            });


                            // TRABAJO PRACTICO N2 
                            // Validaciones 

                            // ver porque no lo toma, posiblemente por ser un arreglo asosiativo.
                            $('#tp2ej3').bootstrapValidator({
                                message: 'Este valor no es valido',
                            
                                 feedbackIcons: {
                            
                                     valid: 'fa fa-check',
                            
                                     invalid: 'fa fa-hand-paper',
                            
                                     validating: 'fa fa-circle'
                                     
                                 },
                            
                                    fields: {
                            
                                        username: {
                            
                                            validators: {
                            
                                                notEmpty: {
                            
                                                    message: 'Debe ingresar su usuario '
                            
                                                }
                                            }
                            
                                        },
                                        password: {
                            
                                            validators: {
                            
                                                notEmpty: {
                            
                                                    message: 'Debe ingresar su contrase&ntilde;a'
                            
                                                }, regexp: {
                        
                                                    regexp: /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d).*$/,

                                                    message: 'la contraseña debe tener al menos 8 caracteres <br> la contraseña debe tener numeros y letras (mayusculas y minusculas)'
                                                    // Faltaria verificar que el user no este en el password
                                                }

                            
                                            }
                            
                                        }
        
                                    }
                            
                                });

                        $('#tp2ej4').bootstrapValidator({
                            message: 'Este valor no es valido',
                        
                             feedbackIcons: {
                        
                                 valid: 'fa fa-check',
                        
                                 invalid: 'fa fa-hand-paper',
                        
                                 validating: 'fa fa-circle'
                                 
                             },
                        
                                fields: {
                        
                                    titulo: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar el titulo '
                        
                                            }
                        
                                        }
                        
                                    },
                                    actores: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar los actores '
                        
                                        },
                                             regexp: {
        
                                                regexp: /[a-z&A-Z]+$/,
                           
                                                message: 'El campo no debe contener números'
                           
                                            }
                        
                                        }
                        
                                    },
                                    director: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar el nombre y apellido del direcion '
                        
                                        },
                                             regexp: {
        
                                                regexp: /[a-z&A-Z]+$/,
                           
                                                message: 'El campo no debe contener números'
                           
                                            }
                        
                                        }
                        
                                    },
                                    guion: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar el autor del guion '
                        
                                        },
                                             regexp: {
        
                                                regexp: /[a-z&A-Z]+$/,
                           
                                                message: 'El campo no debe contener números'
                           
                                            }
                        
                                        }
                        
                                    },
                                    produccion: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar el nombre de una produccion '
                        
                                            }
                        
                                        }
                        
                                    },
                                    year: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                    message: 'Debe ingresar un a&ntilde;o '
                        
                                                    }, /*
                                             regexp: {
        
                                                 regexp: /^[0-9]+$/,
                           
                                                    message: 'El campo solo debe contener números'

                           
                                                } */
                                                regexp: {
            
                                                    regexp: /[0-9]{,4}?=+$/,
                            
                                                        message: 'El campo solo debe contener números y solo debe tener 4 numeros'
                                                    
                            
                                                }
                        
                                        }
                        
                                    },
                                    nacion: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar una nacionalidad '
                                            },
                        
                                            regexp: {
        
                                                regexp: /[a-z&A-Z]+$/,
                           
                                                message: 'El campo no debe contener números'
                                             
                                                
                           
                                            }
                        
                                        }
                        
                                    },
                                    genero: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe seleccionar un genero '
                                            
                                            }
                        
                                        }
                        
                                    },
                                    minutos: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar una duracion '

                                            },
                        
                                        
                                            regexp: {
        
                                                regexp: /[0-9].{,3}=+$/,
                           
                                                message: 'El campo debe contener números y no mas de 3 numeros.'
                                                
                                                
                           
                                            }
                        
                                        }
                        
                                    },
                                    edad: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe seleccionar una opcion '
                                            
                                            }

                        
                                        }
                        
                                    },
                                    sinopsis: {
                        
                                        validators: {
                        
                                            notEmpty: {
                        
                                                message: 'Debe ingresar una sinopsis de la pelicula '
                                            }
                        
                                        }
                                    }
                                }
                            });

