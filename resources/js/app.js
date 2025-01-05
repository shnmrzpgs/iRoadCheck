import './bootstrap';
import './signUpDefer';
import './passRequirements';
import ApexCharts from 'apexcharts'
import Alpine from 'alpinejs'
import lottie from 'lottie-web';
import flatpickr from 'flatpickr';


window.Alpine = Alpine
Alpine.start()

window.ApexCharts = ApexCharts
ApexCharts.start()

document.addEventListener('alpine:init', () => {
    Alpine.store('modal', {
        showModal: false
    });
});

