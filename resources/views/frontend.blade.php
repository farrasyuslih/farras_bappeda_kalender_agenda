<!DOCTYPE html>
<html>

<head> 
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.css" rel="stylesheet">
    <title>Agenda Calendar</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #2f3b4c;
            margin: 0;
            padding: 24px;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            background: #ffffff;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin-top: 0;
            color: #1f2d3d;
        }

        .search-box {
            display: flex;
            gap: 10px;
            margin: 16px 0 20px;
            flex-wrap: wrap;
            align-items: center;
        }

        #search {
            flex: 1;
            min-width: 220px;
            padding: 10px 12px;
            border: 1px solid #d9e2ec;
            border-radius: 8px;
            font-size: 14px;
        }

        #search-btn {
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            background: #1f6fd6;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        #search-btn:hover {
            background: #185ab0;
        }

        #refresh-btn {
            padding: 8px 12px;
            border: none;
            border-radius: 8px;
            background: #eaf3ff;
            color: #1f6fd6;
            cursor: pointer;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #d9eefa;
        }

        #refresh-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        #search-loading {
            display: none;
            font-size: 14px;
            color: #1f6fd6;
            align-self: center;
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .spinner {
            width: 16px;
            height: 16px;
            animation: spin 1s linear infinite;
            transform-origin: center;
            /* circle stroke is handled inline in svg */
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loading-text {
            display: inline-block;
        }

        #empty-state {
            display: none;
            margin-top: 14px;
            color: #4d5b70;
            background: #eef5ff;
            border: 1px solid #cfe2ff;
            border-radius: 8px;
            padding: 10px 12px;
        }

        hr {
            border: 0;
            border-top: 1px solid #e8edf3;
            margin: 20px 0;
        }

        #calendar {
            border: 1px solid #e8edf3;
            border-radius: 10px;
            padding: 8px;
            background: #fff;
        }

        .fc .fc-button-primary {
            background-color: #1f6fd6;
            border-color: #1f6fd6;
        }

        .fc .fc-button-primary:hover,
        .fc .fc-button-primary:focus {
            background-color: #185ab0;
            border-color: #185ab0;
        }

        .fc .fc-button-primary:not(:disabled).fc-button-active {
            background-color: #0f4a95;
            border-color: #0f4a95;
        }

        .fc .fc-daygrid-event {
            background-color: #2f7de1;
            border-color: #2f7de1;
            white-space: normal;
        }

        .fc .fc-event-main,
        .fc .fc-event-title {
            white-space: normal;
            overflow: visible;
            text-overflow: unset;
            line-height: 1.3;
        }

        .agenda-event-text {
            white-space: normal;
            word-break: break-word;
        }

        .fc .fc-col-header-cell.fc-day-sun .fc-col-header-cell-cushion,
        .fc .fc-daygrid-day.fc-day-sun .fc-daygrid-day-number {
            color: #d93025;
            font-weight: 600;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.45);
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .modal-overlay.show {
            display: flex;
        }

        .modal-content {
            width: min(460px, 90%);
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            position: relative;
            box-shadow: 0 8px 30px rgba(15, 23, 42, 0.2);
        }

        .modal-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 8px;
        }

        .modal-title {
            margin: 0;
            color: #1f2d3d;
            font-size: 18px;
        }

        .modal-body {
            color: #2f3b4c;
            font-size: 14px;
            line-height: 1.4;
        }

        .modal-footer {
            margin-top: 16px;
            text-align: right;
        }

        .modal-close {
            position: absolute;
            top: 8px;
            right: 12px;
            border: none;
            background: transparent;
            font-size: 24px;
            line-height: 1;
            color: #4d5b70;
            cursor: pointer;
        }

        .warning-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            background: #fff6e5;
            color: #e69900;
            border: 1px solid #fde3a7;
            flex-shrink: 0;
        }

        .warning-title {
            color: #1f2d3d;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .modal-note {
            color: #465463;
        }
    </style>
</head>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.19/locales-all.global.min.js"></script>
<body>
    <div class="container">
        <h2>Kalender Agenda BAPPEDA</h2>

        <div class="search-box">
            <input
                type="text"
                id="search"
                placeholder="Cari agenda">

            <button id="search-btn">
                Cari
            </button>

            <button id="refresh-btn" title="Refresh agenda" aria-label="Refresh agenda">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="#1f6fd6"
                stroke-width="1"
                stroke-linecap="round"
                stroke-linejoin="round"
                >
                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                </svg>
                <span style="font-size:13px">Refresh</span>
            </button>
        </div>

        <hr>

        <div id="calendar"></div>

        <!-- Loading modal (overlay) -->
        <div id="loading-modal" class="modal-overlay" aria-hidden="true">
            <div class="modal-content" role="status" aria-live="polite" style="display:flex;flex-direction:column;align-items:center;gap:12px;">
                <svg class="spinner" viewBox="0 0 100 101" width="56" height="56" aria-hidden="true">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5097 50 91.5097C72.5987 91.5097 90.9187 73.1895 90.9187 50.5908C90.9187 27.9921 72.5987 9.67226 50 9.67226C27.4016 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#e6f0ff"></path>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.369 89.8167 20.348C85.8452 15.1192 80.882 10.7237 75.2124 7.41289C69.5422 4.10194 63.2756 1.94025 56.769 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62374C39.0879 9.04874 41.5694 10.4717 44.0505 10.1071C47.8512 9.54855 51.7191 9.52689 55.5402 10.0491C60.8648 10.7767 65.9927 12.5457 70.6333 15.2554C75.2738 17.9651 79.3348 21.5618 82.5849 25.841C84.9175 28.9123 86.7999 32.2916 88.1811 35.8759C89.083 38.2158 91.5424 39.6784 93.9676 39.0409Z" fill="#1f6fd6"></path>
                </svg>
                <div style="color:#1f6fd6;font-weight:600">Memuat agenda...</div>
            </div>
        </div>

        <!-- Not found / warning modal -->
        <div id="notfound-modal" class="modal-overlay" role="dialog" aria-modal="true" aria-hidden="true">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="warning-icon" aria-hidden="true">⚠</div>
                    <div>
                        <h3 class="modal-title">Pencarian Tidak Ditemukan</h3>
                        <div class="modal-note">Agenda yang sesuai dengan pencarian tidak ditemukan.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="notfound-close" style="padding:8px 12px;border-radius:8px;border:none;background:#1f6fd6;color:#fff;cursor:pointer;">Tutup</button>
                </div>
            </div>
        </div>

        <!-- Detail agenda modal (enhanced) -->
        <div id="agenda-modal" class="modal-overlay" role="dialog" aria-modal="true" aria-hidden="true">
            <div class="modal-content">
                <button id="modal-close" class="modal-close" aria-label="Tutup">&times;</button>
                <div class="modal-header">
                    <h3 id="detail-title" class="modal-title">Detail Agenda</h3>
                </div>
                <div class="modal-body">
                    <div><strong>Nama agenda:</strong></div>
                    <div id="detail-name" style="margin-bottom:12px;font-weight:600"></div>

                    <div><strong>Tanggal:</strong></div>
                    <div id="detail-date" style="margin-bottom:12px"></div>

                    <div><strong>Jam:</strong></div>
                    <div id="detail-time" style="margin-bottom:12px"></div>

                    <div><strong>Durasi:</strong></div>
                    <div id="detail-duration" style="margin-bottom:12px"></div>

                    <div><strong>Deskripsi agenda:</strong></div>
                    <div id="detail-description"></div>
                </div>
                <div class="modal-footer">
                    <button id="detail-close" style="padding:8px 12px;border-radius:8px;border:none;background:#1f6fd6;color:#fff;cursor:pointer;">Tutup</button>
                </div>
            </div>
        </div>

    </div>
    <script>

    $(document).ready(function() {
        var calendarEl = document.getElementById('calendar');
        var modalEl = $('#agenda-modal');
        var detailNameEl = $('#detail-name');
        var detailDateEl = $('#detail-date');
        var detailTimeEl = $('#detail-time');
        var detailDurationEl = $('#detail-duration');
        var detailDescriptionEl = $('#detail-description');
        var loadingModal = $('#loading-modal');
        var notFoundModal = $('#notfound-modal');
        var notFoundCloseBtn = $('#notfound-close');

        var currentKeyword = '';
        var isLoading = false;
        var minimumLoadingTime = 500; // ms
        var loadingStart = null;

        function showLoadingModal() {
            isLoading = true;
            loadingStart = Date.now();
            loadingModal.attr('aria-hidden', 'false').addClass('show');
            $('#search-btn').prop('disabled', true);
            $('#refresh-btn').prop('disabled', true);
        }

        function hideLoadingModal() {
            var elapsed = Date.now() - (loadingStart || 0);
            var remaining = Math.max(0, minimumLoadingTime - elapsed);
            setTimeout(function() {
                loadingModal.attr('aria-hidden', 'true').removeClass('show');
                $('#search-btn').prop('disabled', false);
                $('#refresh-btn').prop('disabled', false);
                isLoading = false;
            }, remaining);
        }

        function showNotFoundModal() {
            notFoundModal.attr('aria-hidden', 'false').addClass('show');
        }
        function hideNotFoundModal() {
            notFoundModal.attr('aria-hidden', 'true').removeClass('show');
        }

        notFoundCloseBtn.on('click', hideNotFoundModal);
        notFoundModal.on('click', function(e){ if (e.target === this) hideNotFoundModal(); });

        // Detail modal close handlers
        $('#modal-close, #detail-close').on('click', function(){
            modalEl.attr('aria-hidden', 'true').removeClass('show');
        });
        modalEl.on('click', function(e) { if (e.target === this) { modalEl.attr('aria-hidden','true').removeClass('show'); } });

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'id',
            buttonText: { today: 'Hari Ini' },
            eventTimeFormat: { hour: '2-digit', minute: '2-digit', hour12: false },
            eventDisplay: 'block',
            eventContent: function(info) {
                var timeText = info.timeText;
                var displayText = timeText ? (timeText + ' | ' + info.event.title) : info.event.title;
                var textEl = document.createElement('div');
                textEl.className = 'agenda-event-text';
                textEl.textContent = displayText;
                return { domNodes: [textEl] };
            },
            eventClick: function(info) {
                // Populate detail modal
                var ev = info.event;
                var start = ev.start ? new Date(ev.start) : null;
                var end = ev.end ? new Date(ev.end) : null;

                detailNameEl.text(ev.title || '-');

                function formatDate(d) {
                    if (!d) return '-';
                    try {
                        return d.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
                    } catch (e) {
                        return d.toDateString();
                    }
                }
                var startDateText = formatDate(start);
                var endDateText = end ? formatDate(end) : '-';
                var sameDate = start && end &&
                    start.getFullYear() === end.getFullYear() &&
                    start.getMonth() === end.getMonth() &&
                    start.getDate() === end.getDate();
                detailDateEl.text(!end || sameDate ? startDateText : startDateText + ' - ' + endDateText);

                function formatTime(d) {
                    if (!d) return '-';
                    try {
                        return d.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false });
                    } catch (e) {
                        return d.toTimeString().slice(0,5);
                    }

                }
                var startText = formatTime(start);
                if (!end) {
                    detailTimeEl.text((startText || '-') + ' - Selesai');
                } else {
                    var endText = formatTime(end);
                    detailTimeEl.text((startText || '-') + ' - ' + (endText || '-'));
                }

                // Duration calc
                if (start && end) {
                    var diffMin = Math.floor((end - start) / 60000);
                    if (diffMin <= 0) {
                        detailDurationEl.text('0 menit');
                    } else {
                        var hours = Math.floor(diffMin / 60);
                        var minutes = diffMin % 60;
                        var parts = [];
                        if (hours > 0) parts.push(hours + ' jam');
                        if (minutes > 0) parts.push(minutes + ' menit');
                        detailDurationEl.text(parts.join(' '));
                    }
                } else {
                    detailDurationEl.text('Tidak tersedia');
                }

                detailDescriptionEl.text(ev.extendedProps && ev.extendedProps.description ? ev.extendedProps.description : '-');

                modalEl.attr('aria-hidden', 'false').addClass('show');
            },
            events: []
        });

        calendar.render();

        function fetchAgenda(keyword = '') {
            currentKeyword = keyword || '';
            showLoadingModal();

            $.ajax({
                url: '/agenda',
                method: 'GET',
                data: { q: currentKeyword },
                success: function(response) {
                    if (response.code === 200) {
                        calendar.removeAllEvents();
                        calendar.addEventSource(response.data);

                        if (Array.isArray(response.data) && response.data.length === 0) {
                            // show not found modal
                            showNotFoundModal();
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Gagal memuat data agenda:', error);
                },
                complete: function() {
                    hideLoadingModal();
                }
            });
        }

        // Search listener
        $('#search-btn').on('click', function() {
            var kw = $('#search').val() || '';
            fetchAgenda(kw);
        });

        $('#search').keypress(function(e){ if (e.which == 13) { $('#search-btn').click(); } });

        // Refresh button
        $('#refresh-btn').on('click', function(){
            fetchAgenda(currentKeyword);
        });

        // initial load
        fetchAgenda();

    });

    </script>
</body>

</html>