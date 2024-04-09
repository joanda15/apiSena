document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");

    loginForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const formData = new FormData(loginForm);

        fetch(loginForm.action, {
            method: "POST",
            body: formData
        })
        .then(response => {
            if (response.ok) {
                return response.text();
            } else {
                throw new Error("Error al iniciar sesión");
            }
        })
        .then(data => {
            console.log(data); // Puedes manejar la respuesta del servidor aquí
            // Por ejemplo, redireccionar a otra página:
            // window.location.href = "bienvenido.php";
        })
        .catch(error => {
            console.error("Error:", error);
            // Manejar el error, por ejemplo, mostrar un mensaje de error al usuario
        });
    });
});
