document.addEventListener("DOMContentLoaded", async () => {
    await GetData();
    back.addEventListener("click", () => window.location.href = "./home.php");
    save.addEventListener("click", () => {
        if (username.value == null || passwd.value == null || save.classList.contains("greyed-out")) return;

        const formData = new FormData();
        formData.append("username", username.value);
        formData.append("password", passwd.value);
        let picture = pfp.src.split("/");
        upload.files[0] == null ? formData.append("image", picture[picture.length - 1]) : formData.append("image", upload.files[0]);

        fetch("./Scripts/UpdateUserData.php", {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            let json = JSON.parse(data);
            if (json.success) {
                save.classList.add("greyed-out");
            } else alert(json.status);
        })
        .catch(error => console.error(error));
    });
    username.addEventListener("input", (event) => UpdateSaveButton(event.target));
    passwd.addEventListener("input", (event) => UpdateSaveButton(event.target));
    upload.addEventListener("input", () => {
        save.classList.remove("greyed-out");
        const file = upload.files[0];
        const reader = new FileReader();
        reader.addEventListener("load", (event) => {
            pfp.src = event.target.result;
        });
        reader.readAsDataURL(file);
    });
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
                    grid.appendChild(div);
                    let img = document.createElement("img");
                    img.src = "./Media/Pictures/file.png";
                    div.appendChild(img);
                    let span = document.createElement("span");
                    let path = row.path.split("/");
                    span.innerHTML = path[path.length - 1];
                    div.appendChild(span);
                    div.addEventListener("click", () => DownloadFile(`./User Media/${json.username}/saved-conversations/${span.innerHTML}`, span.innerHTML));
                }
            }
        })
        .catch(error => console.error(error));
}

function DownloadFile(path, filename) {
    const a = document.createElement("a");
    a.href = path;
    a.download = filename || "download";
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

function UpdateSaveButton(element) {
    if (element.defaultValue != element.value) save.classList.remove("greyed-out");
    else save.classList.add("greyed-out");
}