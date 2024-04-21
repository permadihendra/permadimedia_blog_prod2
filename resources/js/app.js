// Required Bootstrap js
import "bootstrap";
import "../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js";

import "./datatables-simple-demo";
import "./scripts";

import * as bootstrap from "bootstrap";
window.bootstrap = bootstrap;

document.addEventListener("livewire:navigated", (event) => {
    // Dom Load Datatables when wire:navigate
    const datatablesSimple = document.getElementById("datatablesSimple");
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }

    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem("sb|sidebar-toggle") === "true") {
        //     document.body.classList.toggle("sb-sidenav-toggled");
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});
