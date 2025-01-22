import './bootstrap';
import './signUpDefer';
import './passRequirements';
import ApexCharts from 'apexcharts'
import Alpine from 'alpinejs'
import Notify from 'simple-notify';
import 'simple-notify/dist/simple-notify.css';
import lottie from 'lottie-web';
import flatpickr from 'flatpickr';
import '../css/app.css';

document.addEventListener('sweet-alert', (event) => {
    Swal.fire({
        icon: event.detail.type,
        title: 'Notification',
        text: event.detail.message,
    });
})

window.Notify = Notify;

window.pushNotification = function (status, title, text) {
    new Notify({
        status: status,
        title: title,
        text: text,
        effect: 'fade',
        speed: 300,
        customClass: null,
        customIcon: null,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 10000,
        gap: 20,
        distance: 20,
        type: 'outline',
        position: 'right top',
    });
}

window.Alpine = Alpine
Alpine.start()

window.ApexCharts = ApexCharts
ApexCharts.start()

document.addEventListener('alpine:init', () => {
    Alpine.store('modal', {
        showModal: false
    });
});

document.addEventListener('alpine:init', () => {
    Alpine.data('navigation', () => ({
        activeLink: localStorage.getItem('activeLink') || '',
        activeChildLink: localStorage.getItem('activeChildLink') || ''
    }));
});



