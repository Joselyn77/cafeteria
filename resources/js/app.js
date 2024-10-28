/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.mount('#app');

// Código para mostrar la ventana de factura
document.addEventListener('livewire:load', function () {
    Livewire.on('showFacturaModal', function (pedidoId) {
        $('#facturaModal').modal('show'); // Si estás usando Bootstrap
    });
});
