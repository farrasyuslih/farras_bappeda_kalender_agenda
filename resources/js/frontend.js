
$(document).ready(function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: []
    })

    calendar.render();

    // Fungsi fetch data agenda dari server
    function fetchAgenda(keyword = '') {
        $.ajax({
            url: '/agenda',
            method: 'GET',
            data: { q: keyword },
            success: function(response) {
                if (response.code === 200) {
                    calendar.removeAllEvents(); // Hapus semua event sebelumnya
                    calendar.addEventSource(response.data); // Tambahkan event baru
                }
            },
            error: function(xhr, status, error) {
                console.error('Gagal memuat data agenda:', error);
            }
        });
    }

    // Listener untuk tombol pencarian
    $('#search-btn').on('click', function() {
        let keyword = $('#search').val();
        fetchAgenda(keyword);
    });

    // load data awal
    fetchAgenda();
});
