<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Ejercicio 1</title>

        <!-- Styles -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="<?= BASE_URL . 'resources/css/bootstrap.min.css' ?>"/>
    </head>
    <body>

        <div class="container">
            <form id="createProgrammersForm">
                <h3 class="my-3 text-center">Creación de nuevo programador</h3>
                
                <!-- Alertas -->
                <div id="successMessage" class="alert alert-success" role="alert"></div>
                <div id="errorMessage" class="alert alert-danger" role="alert"></div>
                <div id="infoMessage" class="alert alert-primary" role="alert"></div>
                
                <!-- Nombres y apellidos -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" maxlength="25"
                               id="inputName" name="name" required />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastName">Apellido</label>
                        <input type="text" class="form-control" maxlength="25" 
                               id="inputLastName" name="lastName" required />
                    </div>
                </div>

                <!-- Cédula y Correo electrónico -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputDocument">Cédula</label>
                        <input type="text" class="form-control" 
                               maxlength="15" pattern="[0-9]*" required
                               id="inputDocument" name="document"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Correo electrónico</label>
                        <input type="email" class="form-control" 
                               required maxlength="100"
                               id="inputEmail" name="email"/>
                    </div>
                </div>

                <!-- Lenguajes -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputLanguages">Lenguajes</label>
                        <input type="text" class="form-control" 
                               maxlength="50" required
                               id="inputLanguages" name="language"/>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>

        <!-- Scripts -->
        <script type="text/javascript" src="<?= BASE_URL . 'resources/js/jquery-3.5.1.min.js' ?>"></script>
        <script type="text/javascript" src="<?= BASE_URL . 'resources/js/bootstrap.min.js' ?>"></script>
        <script type="text/javascript" src="<?= BASE_URL . 'resources/js/scripts.js' ?>"></script>

        <script>
            const BASE_URL = '<?= BASE_URL ?>';
            myScripts.initProgrammers();
        </script>
    </body>
</html>