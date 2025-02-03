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
            .then(response => console.log(response.text()))
            .then(data => {
                let json = JSON.parse(data);
                console.log(json);
                if (json.success) window.location.href = "./home.php";
                else alert("No se ha podido crear la cuenta");
            })
            .catch(error => {
                alert(error);
            });
    });
});