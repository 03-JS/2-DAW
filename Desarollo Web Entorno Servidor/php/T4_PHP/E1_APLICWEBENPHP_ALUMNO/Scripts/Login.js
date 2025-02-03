document.addEventListener("DOMContentLoaded", () => {
    loginButton.addEventListener("click", () => {
        const formData = new FormData();
        formData.append("username", username.value);
        formData.append("passwd", passwd.value);

        fetch('./Scripts/ValidateLogin.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) window.location.href = "../home.php";
                else alert("Datos incorrectos");
            })
            .catch(error => {
                alert(error);
            });
    });

    createAccButton.addEventListener("click", () => window.location.href = "./create_account.html");
});