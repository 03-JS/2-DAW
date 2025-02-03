document.addEventListener("DOMContentLoaded", () => {
    createAccButton.addEventListener("click", () => {
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
                else ShowError("No se ha podido crear la cuenta");
            })
            .catch(error => {
                ShowError(error);
            });
    });
});

function ShowError(err) {
    alert(err);
}