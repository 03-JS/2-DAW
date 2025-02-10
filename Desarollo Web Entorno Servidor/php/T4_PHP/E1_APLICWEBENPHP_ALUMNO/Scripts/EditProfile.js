document.addEventListener("DOMContentLoaded", async () => {
    await GetData();
});

async function GetData() {
    fetch('./Scripts/GetUserData.php', {})
        .then(response => response.text())
        .then(data => {
            let json = JSON.parse(data);
            username.value = json.username;
            passwd.value = json.password;
            pfp.src = json.src;
        })
        .catch(error => {
            console.log(error);
        });
}