require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.Swal = require("sweetalert2");

import DecoupledEditor from "@ckeditor/ckeditor5-build-decoupled-document/build/ckeditor";
window.DecoupledEditor = DecoupledEditor;
