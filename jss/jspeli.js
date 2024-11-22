$(document).ready(function() {
    $('.movie').on('click', function(event) {
        event.preventDefault();
        const movieId = $(this).data('movie-id');
        
        $.ajax({
            url: 'detalle_pelicula.php',
            type: 'GET',
            data: { id: movieId },
            dataType: 'json',
            success: function(data) {
                $('.movie-container').html(`
                    <div class="movie">
                        <div class="movie-details">
                            <img src="img/${data.imagen}" alt="Pelicula ${data.id}">
                            <h2>${data.titulo}</h2>
                            <p>${data.descripcion}</p>
                            <p>Director: ${data.director}</p>
                        </div>
                        <div class="watch-link">
                            <iframe width="560" height="315" src="${data.video_link}" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                `);
            },
            error: function() {
                alert('Error al cargar los detalles de la película.');
            }
        });
    });
});
