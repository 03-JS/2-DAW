let index = 0;

function Load() {
    // document.querySelector(`#username-${index}`).disabled = true;
    // document.querySelector(`#surname-${index}`).disabled = true;
    // document.querySelector(`#dni-${index}`).disabled = true;

    add.addEventListener("click", CreateElements);

    // AddEditEvent(document.querySelector(`#edit-${index}`));
    // AddDeleteEvent(document.querySelector(`#del-${index}`));
}

function CreateElements() {
    // Create the table element
    const table = document.createElement("table");
    table.id = `content-${index}`;

    // Create the first row (header row)
    const headerRow = document.createElement("tr");

    const headers = ["Nombre", "Apellidos", "DNI"];
    headers.forEach(headerText => {
        const headerCell = document.createElement("td");
        headerCell.textContent = headerText;
        headerRow.appendChild(headerCell);
    });

    // Append the header row to the table
    table.appendChild(headerRow);

    // Create the second row (input row)
    const inputRow = document.createElement("tr");

    // Create the username input cell
    const nombreCell = document.createElement("td");
    const nombreInput = document.createElement("input");
    nombreInput.type = "text";
    nombreInput.id = `username-${index}`;
    nombreInput.disabled = true;
    nombreCell.appendChild(nombreInput);
    inputRow.appendChild(nombreCell);

    // Create the surname input cell
    const apellidoCell = document.createElement("td");
    const apellidoInput = document.createElement("input");
    apellidoInput.type = "text";
    apellidoInput.id = `surname-${index}`;
    apellidoInput.disabled = true;
    apellidoCell.appendChild(apellidoInput);
    inputRow.appendChild(apellidoCell);

    // Create the dni input cell
    const dniCell = document.createElement("td");
    const dniInput = document.createElement("input");
    dniInput.type = "text";
    dniInput.id = `dni-${index}`;
    dniInput.disabled = true;
    dniCell.appendChild(dniInput);
    inputRow.appendChild(dniCell);

    // Create the edit button cell
    const editCell = document.createElement("td");
    const editButton = document.createElement("button");
    editButton.className = "enabled edit";
    editButton.id = `edit-${index}`;
    editButton.textContent = "Editar";
    AddEditEvent(editButton);
    editCell.appendChild(editButton);
    inputRow.appendChild(editCell);

    // Create the del button cell
    const deleteCell = document.createElement("td");
    const deleteButton = document.createElement("button");
    deleteButton.className = "enabled delete";
    deleteButton.id = `del-${index}`;
    deleteButton.textContent = "X";
    AddDeleteEvent(deleteButton);
    deleteCell.appendChild(deleteButton);
    inputRow.appendChild(deleteCell);

    // Append the input row to the table
    table.appendChild(inputRow);

    // Append the table to the container
    container.appendChild(table);

    index++;
}

function AddDeleteEvent(element) {
    element.addEventListener("click", (event) => {
        event.target.parentNode.parentNode.parentNode.remove();
        index = parseInt(element.id.split("-")[1]);
    });
}

function AddEditEvent(element) {
    element.addEventListener("click", (event) => {
        document.querySelector(`#content-${index}, #username-${index}`).disabled = false;
        document.querySelector(`#content-${index}, #surname-${index}`).disabled = false;
        document.querySelector(`#content-${index}, #dni-${index}`).disabled = false;
        event.target.disabled = true;
        event.target.classList.remove("enabled");
    })
}