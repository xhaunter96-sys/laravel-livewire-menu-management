import Alpine from "alpinejs";
import { initFlowbite } from "flowbite";
import "./bootstrap";

document.addEventListener("livewire:navigated", () => {
    initFlowbite();
});

window.Alpine = Alpine;

Alpine.start();
