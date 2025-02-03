<x-app-layout>

    <livewire:camera-capture/>
    <x-success-modal successMessage="Your report road concern submitted successfully." x-show="openSuccessModal"></x-success-modal>
    @if(session('success'))
        <script>
            // Trigger the modal and reload after 2 seconds
            document.addEventListener('DOMContentLoaded', function() {
                openSuccessModal = true;
                setTimeout(() => location.reload(), 2000);
            });
        </script>
    @endif
</x-app-layout>
