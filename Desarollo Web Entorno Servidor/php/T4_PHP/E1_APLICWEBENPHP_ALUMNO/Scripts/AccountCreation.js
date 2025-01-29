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
            .then(response => response.json())
            .then(data => {
                window.location.href = "../home.php";
            })
            .catch(error => {
                alert(error);
            });
        window.location.href = "./home.html";
    });
});