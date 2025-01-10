export class CardElement extends HTMLElement {
    xp;
    image;
    name;

    constructor(xp, image, name) {
        super();
        this.xp = xp;
        this.image = image;
        this.name = name;
        this.innerHTML = `
        <img src${this.image}/>
        <div class="experiencia">${xp}</div>
        <div class="nombre">${name}</div>
        `;
    }
}

customElements.define("pokemon-card", CardElement);