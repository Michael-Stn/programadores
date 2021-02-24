/* global BASE_URL */
var myScripts = (() => {

    programmersController = () => {

        // Inicialización
        $(document).ready(() => {
            $('#successMessage, #errorMessage, #infoMessage').hide();

            $('#createProgrammersForm').on('submit', (evt) => {
                evt.preventDefault();
                $('#successMessage, #errorMessage, #infoMessage').hide();
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
            });
        });
    };

    return {
        initProgrammers: programmersController
    };

})();