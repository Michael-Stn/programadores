/* global BASE_URL */
const myScripts = (() => {

    /**
     * Controlador JS para programadores
     * @author Michael Avila <mstavila99@gmail.com>
     * @date 24/02/2021
     */
    const programmersController = () => {

        // Inicialización
        $(document).ready(() => {
            hideAlerts();
            $('#createProgrammersForm').on('submit', (evt) => {
                createProgrammer(evt);
            });
        });

        /**
         * Ocultar los cuadros de alertas
         * @author Michael Avila <mstavila99@gmail.com>
         * @date 24/02/2021
         */
        const hideAlerts = () => {
            $('#successMessage, #errorMessage, #infoMessage').hide();
        };

        /**
         * Enviar petición para crear un programador
         * @author Michael Avila <mstavila99@gmail.com>
         * @date 24/02/2021
         */
        const createProgrammer = (evt) => {
            evt.preventDefault();
            hideAlerts();
            $.ajax({
                method: 'POST',
                url: BASE_URL.concat('programadores/crear'),
                dataType: 'json',
                data: $('#createProgrammersForm').serialize(),
                success: (response) => {
                    if (response.status === 200) {
                        $('#successMessage').show().text(response.message);

                        let infoMessage = 'Núm. programadores: ' + response.totalProgrammers;
                        $('#infoMessage').show().text(infoMessage);

                        $('#createProgrammersForm')[0].reset();
                    } else {
                        $('#errorMessage').show().text(response.message);
                    }
                },
                error: () => {
                    $('#errorMessage').show('Se ha presentado un problema con la petición');
                }
            });
        };

    };

    return {
        initProgrammers: programmersController
    };

})();