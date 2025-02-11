document.addEventListener("DOMContentLoaded", async () => {
    await GetData();

});

async function GetData() {
    fetch('./Scripts/GetUserData.php', {})
        .then(response => response.text())
        .then(data => {
            let json = JSON.parse(data);
            console.log(json);
            username.defaultValue = json.username;
            passwd.defaultValue = json.password;
            pfp.src = json.src.substring(1);
            if (json.rows.length > 0) {
                convTitle.classList.remove("hidden");
                let grid = document.querySelector(".grid");
                grid.classList.remove("hidden");
                for (row of json.rows) {
                    let div = document.createElement("div");
                    div.classList.add("file");
                    let img = document.createElement("img");
                    img.src = "./Media/Pictures/file.png";
                    let span = document.createElement("span");
                    let path = row.path.split("/");
                    span.innerHTML = path[path.length - 1];
                }
            }
        })
        .catch(error => {
            console.error(error);
        });
}