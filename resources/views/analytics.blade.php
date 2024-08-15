<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytic Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styleanalytics.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-4">
            <a href="javascript:history.back()" class="btn btn-light">
                <i class="fas fa-arrow-left"></i> Back
            </a>
            <h1 class="text-center mb-0 flex-grow-1">Analytic</h1>
            <a href="{{ url('/menu') }}" class="btn btn-light">
                <i class="fas fa-home"></i> Home
            </a>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-building summary-icon"></i>
                    <h2>Indibiz Ruko</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Ruko adalah sebanyak <span id="indibiz-ruko-count" class="highlighted-count">[....]</span></p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-school summary-icon"></i>
                    <h2>Indibiz Sekolah</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Sekolah adalah sebanyak <span id="indibiz-sekolah-count" class="highlighted-count">[....]</span></p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-hotel summary-icon"></i>
                    <h2>Indibiz Hotel</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Hotel adalah sebanyak <span id="indibiz-hotel-count" class="highlighted-count">[....]</span></p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-money-bill summary-icon"></i>
                    <h2>Indibiz MultiFinance</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz MultiFinance adalah sebanyak <span id="indibiz-multifinance-count" class="highlighted-count">[....]</span></p>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-house-medical summary-icon"></i>
                    <h2>Indibiz Health</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Health adalah sebanyak <span id="indibiz-health-count" class="highlighted-count">[....]</span></p>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-truck summary-icon"></i>
                    <h2>Indibiz Ekspedisi</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Ekspedisi adalah sebanyak <span id="indibiz-ekspedisi-count" class="highlighted-count">[....]</span></p>
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-bolt summary-icon"></i>
                    <h2>Indibiz Energy</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Energy adalah sebanyak <span id="indibiz-energy-count" class="highlighted-count">[....]</span></p>
                </div>
            </div>
            <!-- Tambahkan lebih banyak ringkasan sesuai kebutuhan -->
        </div>
    </div><script>
        document.addEventListener('DOMContentLoaded', function () {
            // Fungsi untuk mengambil data dari LocalStorage
            function getDataFromStorage() {
                return JSON.parse(localStorage.getItem('markers')) || [];
            }
    
            // Fungsi untuk menghitung jumlah data berdasarkan tipe dan segmen
            function countDataBySegmen(type, segmen) {
                let markers = getDataFromStorage();
                return markers.filter(marker => marker.type === type && marker.segmen === segmen).length;
            }
    
            // Mengupdate jumlah pengguna pada setiap segmen di halaman
            document.getElementById('indibiz-ruko-count').innerText = countDataBySegmen('Indibiz', 'Indibiz Ruko');
            document.getElementById('indibiz-sekolah-count').innerText = countDataBySegmen('Indibiz', 'Indibiz Sekolah');
            document.getElementById('indibiz-hotel-count').innerText = countDataBySegmen('Indibiz', 'Indibiz Hotel');
            document.getElementById('indibiz-multifinance-count').innerText = countDataBySegmen('Indibiz', 'Indibiz MultiFinance');
            document.getElementById('indibiz-health-count').innerText = countDataBySegmen('Indibiz', 'Indibiz Health');
            document.getElementById('indibiz-ekspedisi-count').innerText = countDataBySegmen('Indibiz', 'Indibiz Ekspedisi');
            document.getElementById('indibiz-energy-count').innerText = countDataBySegmen('Indibiz', 'Indibiz Energy');
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
