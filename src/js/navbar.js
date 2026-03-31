//VALIDACION Y ENVIO AJAX
document
  .getElementById("registerForm")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    const username = document.getElementById("register-user").value.trim();
    const email = document.getElementById("register-email").value.trim();
    const password = document.getElementById("register-password").value;
    const confirmPassword = document.getElementById(
      "register-confirm-password"
    ).value;

    if (password !== confirmPassword) {
      alert("Las contraseñas no coinciden.");
      return;
    }

    if (
      password.length < 6 ||
      !/\d/.test(password) ||
      !/[a-zA-Z]/.test(password)
    ) {
      alert(
        "La contraseña debe tener mínimo 6 caracteres, incluyendo letras y números."
      );
      return;
    }

    // Si todo está bien, enviar a PHP
    const formData = new FormData();
    formData.append("username", username);
    formData.append("email", email);
    formData.append("password", password);

    fetch("registrar_usuario.php", {
      method: "POST",
      body: formData,
    })
      .then((res) => res.text())
      .then((response) => {
        alert(response); // Mensaje desde PHP
        document.getElementById("registerForm").reset();
      });
  });


