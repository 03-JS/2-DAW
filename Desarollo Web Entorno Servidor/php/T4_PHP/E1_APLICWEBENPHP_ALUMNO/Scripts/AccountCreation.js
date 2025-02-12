document.addEventListener("DOMContentLoaded", () => {
    createAccButton.addEventListener("click", () => {
        // if (username.value == null || passwd.value == null || upload.files[0] == null) return;

        const formData = new FormData();
        formData.append("username", username.value);
        formData.append("passwd", passwd.value);
        formData.append("image", upload.files[0]);

        fetch('./Scripts/CreateAccount.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                let json = JSON.parse(data);
                if (json.success) window.location.href = "./home.php";
                else ShowError("No se ha podido crear la cuenta. Rellene todos los campos");
            })
            .catch(error => ShowError("La cuenta ya existe"));
    });
});

function ShowError(err) {
    errorText.innerHTML = err;
}