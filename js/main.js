document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.getElementById("loginForm");
    const registerForm = document.getElementById("registerForm");
    const userDataDiv = document.getElementById("userData");

    loginForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const formData = new FormData(loginForm);
        const response = await fetch("login.php", {
            method: "POST",
            body: formData
        });
        const result = await response.json();
        
        if (result.success) {
            displayUserData(result.user);
        } else {
            alert("Usuario o contraseña incorrectos");
        }
    });

    registerForm.addEventListener("submit", async (e) => {
        e.preventDefault();
        const formData = new FormData(registerForm);
        const response = await fetch("register.php", {
            method: "POST",
            body: formData
        });
        const result = await response.json();
        
        if (result.success) {
            alert("Registro exitoso. Ahora puedes iniciar sesión.");
            registerForm.reset();
        } else {
            alert("Error en el registro. Inténtalo nuevamente.");
        }
    });

    function displayUserData(user) {
        document.getElementById("displayUsername").textContent = user.username;
        document.getElementById("displayNombre").textContent = user.nombre;
        document.getElementById("displayFechaNacimiento").textContent = user.fecha_nacimiento;
        document.getElementById("displayDomicilio").textContent = user.domicilio;

        userDataDiv.style.display = "block";
        loginForm.style.display = "none";
        registerForm.style.display = "none";
    }
});

