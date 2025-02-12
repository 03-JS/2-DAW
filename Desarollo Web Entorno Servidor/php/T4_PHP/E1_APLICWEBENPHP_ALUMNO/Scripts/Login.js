document.addEventListener("DOMContentLoaded", () => {
    loginButton.addEventListener("click", () => {
        const formData = new FormData();
        formData.append("username", username.value);
        formData.append("passwd", passwd.value);

        fetch('./Scripts/ValidateLogin.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                let json = JSON.parse(data);
                if (json.success) window.location.href = "./home.php";
                else ShowError("No se ha podido iniciar sesión");
            })
            .catch(error => {
                ShowError(error);
            });
    });

    createAccButton.addEventListener("click", () => window.location.href = "./create_account.php");
});

function ShowError(err) {
    errorText.innerHTML = err;
}