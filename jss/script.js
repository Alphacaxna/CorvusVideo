document.addEventListener("DOMContentLoaded", async () => {
    const loginBtn = document.getElementById("loginBtn");
    const loginModal = document.getElementById("loginModal");
    const closeLoginModal = document.getElementById("closeLoginModal");

    if (loginBtn && loginModal && closeLoginModal) {
        loginBtn.addEventListener("click", () => {
            loginModal.style.display = "block";
        });

        closeLoginModal.addEventListener("click", () => {
            loginModal.style.display = "none";
        });

        window.addEventListener("click", (event) => {
            if (event.target === loginModal) {
                loginModal.style.display = "none";
            }
        });
    }

    const registerBtn = document.getElementById("showRegisterForm1");
    const registerModal = document.getElementById("registerModal");
    const closeRegisterModal = document.getElementById("closeRegisterModal");

    if (registerBtn && registerModal && closeRegisterModal) {
        registerBtn.addEventListener("click", () => {
            registerModal.style.display = "block";
        });

        closeRegisterModal.addEventListener("click", () => {
            registerModal.style.display = "none";
        });

        window.addEventListener("click", (event) => {
            if (event.target === registerModal) {
                registerModal.style.display = "none";
            }
        });
    }

    const closeAgradecimientoModal = document.getElementById('closeAgradecimientoModal');
    const agradecimientoModal = document.getElementById('agradecimientoModal');

    if (closeAgradecimientoModal && agradecimientoModal) {
        closeAgradecimientoModal.addEventListener('click', function () {
            agradecimientoModal.style.display = 'none';
        });
    }

    const errorMessageModal = document.getElementById('errorMessageModal');

    function showErrorModal(message) {
        const modalContent = errorMessageModal.querySelector('.modal-content');
        modalContent.innerHTML = `
            <span class="close-modal" id="closeErrorMessageModal">×</span>
            <h2>Error</h2>
            <p>${message}</p>
        `;
        errorMessageModal.style.display = 'block';
    }

    if (errorMessageModal) {
        errorMessageModal.querySelector('#closeErrorMessageModal').addEventListener('click', function () {
            errorMessageModal.style.display = 'none';
        });
    }

    function showAgradecimientoModal(message) {
        if (agradecimientoModal) {
            agradecimientoModal.innerHTML = `
                <span class="close-modal" id="closeAgradecimientoModal">×</span>
                <h2>Gracias!</h2>
                <p>${message}</p>
            `;
            agradecimientoModal.style.display = 'block';
        }
    }

    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', async function (event) {
            event.preventDefault();
            const email = loginForm.email.value;

            try {
                const response = await fetch(`obtener_nombre_usuario.php?email=${email}`);
                const data = await response.json();

                if (data.username) {
                    const welcomeMessage = `Bienvenido, ${data.username}!`;
                    loginModal.style.display = 'none';
                    showAgradecimientoModal(welcomeMessage);

                    setTimeout(() => {
                        if (agradecimientoModal) {
                            agradecimientoModal.style.display = 'none';
                        }
                    }, 2000);
                } else {
                    showErrorModal("No se encontró ningún usuario con ese correo electrónico.");
                }
            } catch (error) {
                console.error("Error al obtener el nombre de usuario:", error);
            }
        });
    }
    
    const searchForm = document.getElementById("search-form");
    const searchField = document.getElementById("search");
    const movieContainer = document.querySelector('.movie-container');

    if (searchForm && searchField && movieContainer) {
        searchForm.addEventListener('submit', async function (event) {
            event.preventDefault();

            const searchTerm = searchField.value.trim();

            try {
                const response = await fetch(`buscar_pelicula.php?query=${searchTerm}`);
                const peliculas = await response.json();

                movieContainer.innerHTML = ''; // Limpiar los resultados anteriores

                peliculas.forEach(pelicula => {
                    movieContainer.innerHTML += `
                        <div class="movie">
                            <img src="${pelicula.img_path}" alt="${pelicula.titulo}">
                            <h2>${pelicula.titulo}</h2>
                            <p>${pelicula.descripcion}</p>
                            <p>Director: ${pelicula.director}</p>
                            <p>Año: ${pelicula.anio}</p>
                            <p>Genero: ${pelicula.genero}</p>
                            <p>Actores: ${pelicula.actores}</p>
                        </div>
                    `;
                });

            } catch (error) {
                console.error("Error al realizar la búsqueda:", error);
                showErrorModal("No se pudo completar la búsqueda. Por favor, inténtelo de nuevo más tarde.");
            }
        });
    }
});
