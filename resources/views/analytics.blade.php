<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytic Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styleanalytics.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>

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
            <!-- Indibiz Ruko -->
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-building summary-icon"></i>
                    <h2>Indibiz Ruko</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Ruko adalah sebanyak 
                        <span id="indibiz-ruko-count" class="highlighted-count">[....]</span>
                    </p>
                    <p id="indibiz-ruko-message"></p>
                </div>
            </div>
            <!-- Indibiz Sekolah -->
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-school summary-icon"></i>
                    <h2>Indibiz Sekolah</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Sekolah adalah sebanyak 
                        <span id="indibiz-sekolah-count" class="highlighted-count">[....]</span>
                    </p>
                    <p id="indibiz-sekolah-message"></p>
                </div>
            </div>
            <!-- Indibiz Hotel -->
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-hotel summary-icon"></i>
                    <h2>Indibiz Hotel</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Hotel adalah sebanyak 
                        <span id="indibiz-hotel-count" class="highlighted-count">[....]</span>
                    </p>
                    <p id="indibiz-hotel-message"></p>
                </div>
            </div>
            <!-- Indibiz MultiFinance -->
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-money-bill summary-icon"></i>
                    <h2>Indibiz MultiFinance</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz MultiFinance adalah sebanyak 
                        <span id="indibiz-multifinance-count" class="highlighted-count">[....]</span>
                    </p>
                    <p id="indibiz-multifinance-message"></p>
                </div>
            </div>
            <!-- Indibiz Health -->
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-house-medical summary-icon"></i>
                    <h2>Indibiz Health</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Health adalah sebanyak 
                        <span id="indibiz-health-count" class="highlighted-count">[....]</span>
                    </p>
                    <p id="indibiz-health-message"></p>
                </div>
            </div>
            <!-- Indibiz Ekspedisi -->
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-truck summary-icon"></i>
                    <h2>Indibiz Ekspedisi</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Ekspedisi adalah sebanyak 
                        <span id="indibiz-ekspedisi-count" class="highlighted-count">[....]</span>
                    </p>
                    <p id="indibiz-ekspedisi-message"></p>
                </div>
            </div>
            <!-- Indibiz Energy -->
            <div class="col-md-6 mb-4">
                <div class="summary-box">
                    <i class="fa-solid fa-bolt summary-icon"></i>
                    <h2>Indibiz Energy</h2>
                    <p>Berdasarkan data demografi, jumlah pengguna pada segmen Indibiz Energy adalah sebanyak 
                        <span id="indibiz-energy-count" class="highlighted-count">[....]</span>
                    </p>
                    <p id="indibiz-energy-message"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add click event listeners to the count elements
document.getElementById('indibiz-ruko-count').addEventListener('click', function() {
    downloadSegmentData('Indibiz', 'Indibiz Ruko');
});

document.getElementById('indibiz-sekolah-count').addEventListener('click', function() {
    downloadSegmentData('Indibiz', 'Indibiz Sekolah');
});

document.getElementById('indibiz-hotel-count').addEventListener('click', function() {
    downloadSegmentData('Indibiz', 'Indibiz Hotel');
});

document.getElementById('indibiz-multifinance-count').addEventListener('click', function() {
    downloadSegmentData('Indibiz', 'Indibiz MultiFinance');
});

document.getElementById('indibiz-health-count').addEventListener('click', function() {
    downloadSegmentData('Indibiz', 'Indibiz Health');
});

document.getElementById('indibiz-ekspedisi-count').addEventListener('click', function() {
    downloadSegmentData('Indibiz', 'Indibiz Ekspedisi');
});

document.getElementById('indibiz-energy-count').addEventListener('click', function() {
    downloadSegmentData('Indibiz', 'Indibiz Energy');
});

// Function to download the data for a specific segment as XLSX
function downloadSegmentData(type, segmen) {
    var markers = JSON.parse(localStorage.getItem('markers')) || [];
    var filteredMarkers = markers.filter(marker => marker.type === type && marker.segmen === segmen);

    if (filteredMarkers.length === 0) {
        alert('Tidak ada data marker untuk diunduh.');
        return;
    }

    var worksheet = XLSX.utils.json_to_sheet(filteredMarkers);
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, `${segmen} Markers`);

    XLSX.writeFile(workbook, `${segmen}_markers.xlsx`);
}

        document.addEventListener('DOMContentLoaded', function () {
            function getDataFromStorage() {
                return JSON.parse(localStorage.getItem('markers')) || [];
            }

            function countDataBySegmen(type, segmen) {
                let markers = getDataFromStorage();
                return markers.filter(marker => marker.type === type && marker.segmen === segmen).length;
            }

            function updateSegmentInfo(segmentId, type, segmen) {
                const count = countDataBySegmen(type, segmen);
                const countElement = document.getElementById(`${segmentId}-count`);
                const messageElement = document.getElementById(`${segmentId}-message`);
                
                countElement.innerText = count;

                if (count > 15) {
                    messageElement.innerText = `Segmen ini sangat diminati oleh pelanggan, mencerminkan kebutuhan yang tinggi di kalangan bisnis dan masyarakat. Dengan basis pengguna yang kuat, segmen ini memiliki potensi besar untuk terus berkembang dan menjadi andalan dalam strategi bisnis Indibiz. Investasi tambahan dan inovasi di segmen ini dapat mendorong pertumbuhan yang lebih signifikan.`;
messageElement.style.color = "green";
countElement.style.textDecoration = "underline";

                } else if (count < 15 && count > 5) {
                    messageElement.innerText = `Segmen ini menunjukkan minat yang stabil di kalangan pengguna, dengan potensi untuk berkembang lebih lanjut. Ini adalah segmen yang layak untuk dipertahankan dan dioptimalkan dengan strategi yang tepat, demi menarik lebih banyak pelanggan dan meningkatkan penetrasi pasar.`;
messageElement.style.color = "blue";
countElement.style.textDecoration = "underline";

                } else if (count < 5 && count > 0) {
                    messageElement.innerText = `Segmen ini saat ini kurang diminati oleh pengguna. Hal ini bisa menjadi indikasi bahwa ada tantangan di pasar atau kebutuhan yang belum terpenuhi. Mungkin perlu ada pendekatan baru atau strategi yang lebih inovatif untuk menarik minat pelanggan dan meningkatkan keterlibatan di segmen ini.`;
messageElement.style.color = "orange";
countElement.style.textDecoration = "underline";

                } else if (count === 0) {
                    messageElement.innerText = `Segmen ini belum berhasil menarik pengguna. Ini mungkin mengindikasikan bahwa penawaran saat ini tidak relevan atau ada hambatan lain yang menghalangi penetrasi di pasar ini. Segmen ini membutuhkan pendekatan yang benar-benar baru untuk bisa menarik perhatian dan menghasilkan minat dari calon pelanggan.`;
messageElement.style.color = "red";
countElement.style.textDecoration = "underline";

                } else {
                    messageElement.innerText = ``;
                    countElement.style.textDecoration = "none";
                }
            }

            updateSegmentInfo('indibiz-ruko', 'Indibiz', 'Indibiz Ruko');
            updateSegmentInfo('indibiz-sekolah', 'Indibiz', 'Indibiz Sekolah');
            updateSegmentInfo('indibiz-hotel', 'Indibiz', 'Indibiz Hotel');
            updateSegmentInfo('indibiz-multifinance', 'Indibiz', 'Indibiz MultiFinance');
            updateSegmentInfo('indibiz-health', 'Indibiz', 'Indibiz Health');
            updateSegmentInfo('indibiz-ekspedisi', 'Indibiz', 'Indibiz Ekspedisi');
            updateSegmentInfo('indibiz-energy', 'Indibiz', 'Indibiz Energy');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
