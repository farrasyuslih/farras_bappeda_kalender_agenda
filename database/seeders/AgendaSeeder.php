<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgendaSeeder extends Seeder
{
    /**
     * Seed the agendas table.
     */
    public function run(): void
    {
        DB::table('agendas')->insert([
            // 27 Agustus 2026
            [
                'agenda_name' => 'Rapat Pagi Tim',
                'description' => 'Rapat koordinasi pagi.',
                'start_date' => '2026-08-27 07:30:00',
                'end_date' => '2026-08-27 08:00:00',
            ],
            [
                'agenda_name' => 'Briefing Pekerjaan',
                'description' => 'Briefing pekerjaan sebelum aktivitas dimulai.',
                'start_date' => '2026-08-27 08:15:00',
                'end_date' => '2026-08-27 08:45:00',
            ],
            [
                'agenda_name' => 'Review Dokumen',
                'description' => 'Review dokumen pekerjaan.',
                'start_date' => '2026-08-27 09:00:00',
                'end_date' => '2026-08-27 09:30:00',
            ],
            [
                'agenda_name' => 'Diskusi Database',
                'description' => 'Diskusi struktur database aplikasi.',
                'start_date' => '2026-08-27 09:45:00',
                'end_date' => '2026-08-27 10:30:00',
            ],
            [
                'agenda_name' => 'Testing API',
                'description' => 'Pengujian endpoint API.',
                'start_date' => '2026-08-27 10:45:00',
                'end_date' => '2026-08-27 11:30:00',
            ],
            [
                'agenda_name' => 'Istirahat dan Evaluasi',
                'description' => 'Evaluasi singkat hasil pekerjaan pagi.',
                'start_date' => '2026-08-27 11:30:00',
                'end_date' => '2026-08-27 12:00:00',
            ],
            [
                'agenda_name' => 'Rapat Siang',
                'description' => 'Rapat koordinasi setelah istirahat.',
                'start_date' => '2026-08-27 13:00:00',
                'end_date' => '2026-08-27 13:45:00',
            ],
            [
                'agenda_name' => 'Implementasi Fitur',
                'description' => 'Implementasi fitur aplikasi.',
                'start_date' => '2026-08-27 14:00:00',
                'end_date' => '2026-08-27 15:00:00',
            ],
            [
                'agenda_name' => 'Code Review',
                'description' => 'Review kode hasil implementasi.',
                'start_date' => '2026-08-27 15:00:00',
                'end_date' => '2026-08-27 15:30:00',
            ],
            [
                'agenda_name' => 'Laporan Progress',
                'description' => 'Penyusunan laporan progress pekerjaan.',
                'start_date' => '2026-08-27 15:30:00',
                'end_date' => '2026-08-27 16:00:00',
            ],
            [
                'agenda_name' => 'Evaluasi Akhir Hari',
                'description' => 'Evaluasi pekerjaan yang telah dilakukan.',
                'start_date' => '2026-08-27 16:00:00',
                'end_date' => '2026-08-27 16:30:00',
            ],
            [
                'agenda_name' => 'Agenda Tambahan',
                'description' => 'Agenda tambahan untuk pengujian tampilan kalender.',
                'start_date' => '2026-08-27 16:30:00',
                'end_date' => '2026-08-27 17:00:00',
            ],

            // Agenda jangka panjang
            [
                'agenda_name' => 'Pengembangan Sistem Jangka Panjang',
                'description' => 'Pengembangan sistem informasi secara bertahap.',
                'start_date' => '2026-08-10 08:00:00',
                'end_date' => '2026-08-18 17:00:00',
            ],
            [
                'agenda_name' => 'Audit dan Evaluasi Sistem',
                'description' => 'Audit dan evaluasi sistem yang sedang berjalan.',
                'start_date' => '2026-08-20 08:00:00',
                'end_date' => '2026-08-28 17:00:00',
            ],
            [
                'agenda_name' => 'Migrasi Data Project',
                'description' => 'Proses migrasi dan validasi data project.',
                'start_date' => '2026-09-01 08:00:00',
                'end_date' => '2026-09-10 17:00:00',
            ],
            [
                'agenda_name' => 'Penyusunan Dokumentasi Sistem',
                'description' => 'Penyusunan dokumentasi sistem secara menyeluruh.',
                'start_date' => '2026-09-14 08:00:00',
                'end_date' => '2026-09-25 17:00:00',
            ],

            // 28 Agustus 2026
            [
                'agenda_name' => 'Pengumuman',
                'description' => 'Pengumuman singkat.',
                'start_date' => '2026-08-28 08:00:00',
                'end_date' => '2026-08-28 08:05:00',
            ],
            [
                'agenda_name' => 'Meeting Singkat',
                'description' => 'Meeting singkat selama beberapa menit.',
                'start_date' => '2026-08-28 09:00:00',
                'end_date' => '2026-08-28 09:15:00',
            ],
            [
                'agenda_name' => 'Approval Dokumen',
                'description' => 'Persetujuan dokumen.',
                'start_date' => '2026-08-28 10:00:00',
                'end_date' => '2026-08-28 10:10:00',
            ],

            // Duplikasi sesuai data SQL asli
            [
                'agenda_name' => 'Pengembangan Sistem Jangka Panjang',
                'description' => 'Pengembangan sistem informasi secara bertahap.',
                'start_date' => '2026-08-10 08:00:00',
                'end_date' => '2026-08-18 17:00:00',
            ],
            [
                'agenda_name' => 'Audit dan Evaluasi Sistem',
                'description' => 'Audit dan evaluasi sistem yang sedang berjalan.',
                'start_date' => '2026-08-20 08:00:00',
                'end_date' => '2026-08-28 17:00:00',
            ],
            [
                'agenda_name' => 'Migrasi Data Project',
                'description' => 'Proses migrasi dan validasi data project.',
                'start_date' => '2026-09-01 08:00:00',
                'end_date' => '2026-09-10 17:00:00',
            ],
            [
                'agenda_name' => 'Penyusunan Dokumentasi Sistem',
                'description' => 'Penyusunan dokumentasi sistem secara menyeluruh.',
                'start_date' => '2026-09-14 08:00:00',
                'end_date' => '2026-09-25 17:00:00',
            ],

            // 31 Agustus 2026
            [
                'agenda_name' => 'Rapat Koordinasi Pengembangan Sistem Informasi Perencanaan Pembangunan Daerah',
                'description' => 'Rapat koordinasi mengenai pengembangan sistem informasi.',
                'start_date' => '2026-08-31 08:00:00',
                'end_date' => '2026-08-31 09:00:00',
            ],
            [
                'agenda_name' => 'Pembahasan Implementasi Integrasi API Pencarian Agenda dengan FullCalendar',
                'description' => 'Pembahasan teknis integrasi API dan kalender.',
                'start_date' => '2026-08-31 09:30:00',
                'end_date' => '2026-08-31 10:30:00',
            ],
            [
                'agenda_name' => 'Evaluasi Pengembangan Aplikasi Sistem Informasi Berbasis Laravel',
                'description' => 'Evaluasi aplikasi berbasis Laravel.',
                'start_date' => '2026-08-31 11:00:00',
                'end_date' => '2026-08-31 12:00:00',
            ],

            // 3-4 September 2026
            [
                'agenda_name' => 'Workshop Pengembangan Aplikasi',
                'description' => 'Workshop ini membahas proses pengembangan aplikasi mulai dari analisis kebutuhan, perancangan database, implementasi backend menggunakan Laravel, integrasi API, pengembangan frontend, pengujian aplikasi, hingga evaluasi hasil implementasi.',
                'start_date' => '2026-09-03 09:00:00',
                'end_date' => '2026-09-03 15:00:00',
            ],
            [
                'agenda_name' => 'Evaluasi Project',
                'description' => 'Evaluasi dilakukan untuk mengetahui perkembangan project, kendala teknis yang ditemukan selama implementasi, hasil pengujian setiap fitur, kualitas struktur kode, integrasi antara backend dan frontend, serta rencana perbaikan pada tahap berikutnya.',
                'start_date' => '2026-09-04 09:00:00',
                'end_date' => '2026-09-04 12:00:00',
            ],

            // 7 September 2026 - Testing overlap
            [
                'agenda_name' => 'Rapat A',
                'description' => 'Agenda yang overlap dengan Rapat B.',
                'start_date' => '2026-09-07 09:00:00',
                'end_date' => '2026-09-07 11:00:00',
            ],
            [
                'agenda_name' => 'Rapat B',
                'description' => 'Agenda yang overlap dengan Rapat A.',
                'start_date' => '2026-09-07 09:30:00',
                'end_date' => '2026-09-07 10:30:00',
            ],
            [
                'agenda_name' => 'Rapat C',
                'description' => 'Agenda yang overlap dengan Rapat A dan B.',
                'start_date' => '2026-09-07 10:00:00',
                'end_date' => '2026-09-07 12:00:00',
            ],
            [
                'agenda_name' => 'Rapat D',
                'description' => 'Agenda yang dimulai ketika agenda lain masih berjalan.',
                'start_date' => '2026-09-07 10:30:00',
                'end_date' => '2026-09-07 13:00:00',
            ],

            // Agenda tanpa end_date
            [
                'agenda_name' => 'Pengumuman Internal',
                'description' => 'Agenda tanpa waktu selesai.',
                'start_date' => '2026-09-08 09:00:00',
                'end_date' => null,
            ],
            [
                'agenda_name' => 'Agenda Tentatif',
                'description' => 'Waktu selesai belum ditentukan.',
                'start_date' => '2026-09-08 13:00:00',
                'end_date' => null,
            ],
            [
                'agenda_name' => 'Meeting Tentatif',
                'description' => 'Durasi meeting belum ditentukan.',
                'start_date' => '2026-09-09 10:00:00',
                'end_date' => null,
            ],

            // Agenda lintas hari
            [
                'agenda_name' => 'Rapat Malam',
                'description' => 'Agenda dimulai malam dan selesai setelah tengah malam.',
                'start_date' => '2026-09-10 22:00:00',
                'end_date' => '2026-09-11 02:00:00',
            ],
            [
                'agenda_name' => 'Monitoring Malam',
                'description' => 'Monitoring sistem selama beberapa jam.',
                'start_date' => '2026-09-12 23:00:00',
                'end_date' => '2026-09-13 03:00:00',
            ],
        ]);
    }
}