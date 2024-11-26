document.addEventListener("DOMContentLoaded", () => {
    draggable.addEventListener("dragstart", DragStartHandler)
    contenedor.addEventListener("drop", DropHandler);
    contenedor.addEventListener("dragover", DragOverHandler);
    contenedor2.addEventListener("drop", DropHandler);
    contenedor2.addEventListener("dragover", DragOverHandler);
})

function DragOverHandler(event) {
    event.preventDefault();
}

function DragStartHandler(event) {
    event.dataTransfer.setData("text", event.target.id); 
}
  
function DropHandler(event) {
    event.preventDefault();
    event.target.appendChild(document.querySelector(`#${event.dataTransfer.getData("text")}`));
}