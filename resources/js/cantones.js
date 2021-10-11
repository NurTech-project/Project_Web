$("#canton").select2({
    placeholder: "Selecciona una opción",
    language: "es",
    width: '100%',
    ajax: {
        url: "{{ route('canton.select2') }}",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
    templateResult: plantillaBusqueda,
    templateSelection: plantillaSeleccionado
});

function plantillaBusqueda(canton) {
return canton.nombre;
}

function plantillaSeleccionado(canton) {
if (canton.text != "") {
return canton.text
}
return canton.nombre;
}
//y tendrías que hacerte un método en el controlador para gestionarla:


