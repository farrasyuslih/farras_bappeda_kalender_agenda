# Aplikasi Kalender Agenda berbasis Website
### Merupakan sebuah tugas project BAPPEDA PUSDATIN

## Instalasi

### 1. Clone Repository
Clone repository dari GitHub:
git clone https://github.com/farrasyuslih/farras_bappeda_kalender_agenda

### 2. Buat dan konfigurasi file .env
cp .env.example .env
lalu konfigurasi database nya

### 3. Generate app key
php artisan key:generate

### 4. Migrasi database dan seeder
php artisan migrate --seed

### 5. Menjalankan web
php artisan serve

masuk ke "http://127.0.0.1:8000/calender" untuk membuka kalender.
