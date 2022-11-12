<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="calendar"></div>
                
            </div>
        </div>
    </div>
    @push('scripts')
    
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    selectable: true,
                    headerToolbar: {left: 'prev,next today',
                    center: 'title',
                    right: 'timelineCustom,dayGridMonth,timeGridWeek,timeGridDay'},
                    editable: true,
                    displayEventTime: false,
                    droppable: true,
                    fixedWeekCount: false,
                    contentHeight: 650,
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
    @endpush
</x-app-layout>