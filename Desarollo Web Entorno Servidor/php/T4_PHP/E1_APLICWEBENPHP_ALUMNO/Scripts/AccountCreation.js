document.addEventListener("DOMContentLoaded", () => {
    createAccButton.addEventListener("click", () => {
        fetch('./Scripts/CreateAccount.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                
            })
            .catch(error => {
                
            });
        window.location.href = "./home.html";
    });
});