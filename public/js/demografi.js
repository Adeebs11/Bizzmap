document.addEventListener('DOMContentLoaded', function () {
    // Fungsi untuk mengambil data dari LocalStorage
    function getDataFromStorage() {
        return JSON.parse(localStorage.getItem('markers')) || [];
    }

    // Fungsi untuk menghitung data berdasarkan tipe pelanggan
    function countDataByType(type) {
        let markers = getDataFromStorage();
        return markers.filter(marker => marker.type === type).length;
    }

    // Fungsi untuk menghitung data berdasarkan segmen pelanggan
    function countDataBySegmen(type, segmen) {
        let markers = getDataFromStorage();
        return markers.filter(marker => marker.type === type && marker.segmen === segmen).length;
    }
    // Fungsi untuk memperbarui angka pada info box
    function updateInfoBox() {
        const indibizCount = countDataByType('Indibiz');
        const nonCustomerCount = countDataByType('Non-Customer');

        document.querySelector('.info-box.indibiz-count h2').textContent = indibizCount;
        document.querySelector('.info-box.non-customer-count h2').textContent = nonCustomerCount;
    }

    // Panggil fungsi ini saat halaman dimuat
    updateInfoBox();

    // Membuat chart untuk jenis usaha Indibiz
    const ctxBusinessType = document.getElementById('businessTypeChart').getContext('2d');
    const businessTypeChart = new Chart(ctxBusinessType, {
        type: 'pie',
        data: {
            labels: ['Indibiz Sekolah', 'Indibiz Ruko', 'Indibiz Hotel', 'Indibiz MultiFinance', 'Indibiz Health', 'Indibiz Ekspedisi', 'Indibiz Energy'],
            datasets: [{
                data: [
                    countDataBySegmen('Indibiz', 'Indibiz Sekolah'),
                    countDataBySegmen('Indibiz', 'Indibiz Ruko'),
                    countDataBySegmen('Indibiz', 'Indibiz Hotel'),
                    countDataBySegmen('Indibiz', 'Indibiz MultiFinance'),
                    countDataBySegmen('Indibiz', 'Indibiz Health'),
                    countDataBySegmen('Indibiz', 'Indibiz Ekspedisi'),
                    countDataBySegmen('Indibiz', 'Indibiz Energy')
                ],
                backgroundColor: [
                    '#FF6384', // Warna untuk Indibiz Sekolah
                    '#36A2EB', // Warna untuk Indibiz Ruko
                    '#FFCE56', // Warna untuk Indibiz Hotel
                    '#FF9F40', // Warna untuk Indibiz MultiFinance
                    '#4BC0C0', // Warna untuk Indibiz Health
                    '#9966FF', // Warna untuk Indibiz Ekspedisi
                    '#333'  // Warna untuk Indibiz Energy
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                },
                title: {
                    display: true,
                    text: 'Customer Indibiz',
                    font: {
                        size: 20
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });

    // Membuat chart untuk lokasi pengguna di berbagai kecamatan
    const ctxUserLocation = document.getElementById('userLocationChart').getContext('2d');
    const userLocationChart = new Chart(ctxUserLocation, {
        type: 'bar',
        data: {
            labels: ['Pasar Jambi', 'Paal Merah', 'Kota Baru', 'Jambi Selatan', 'Danau Sipin', 'Telanaipura', 'Jambi Timur'],
            datasets: [{
                label: 'Pelanggan Indibiz',
                data: [20, 15, 10, 25, 5, 15, 5],  // Data statis sementara
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',  // Membuat grafik batang horizontal
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Customer Indibiz di Berbagai Kecamatan di Jambi',
                    font: {
                        size: 20  // Ganti ukuran font sesuai keinginan
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });

    // Membuat chart untuk non-pelanggan di berbagai kecamatan
    const ctxAgeGender = document.getElementById('ageGenderChart').getContext('2d');
    const ageGenderChart = new Chart(ctxAgeGender, {
        type: 'bar',
        data: {
            labels: ['Pasar Jambi', 'Paal Merah', 'Kota Baru', 'Jambi Selatan', 'Danau Sipin', 'Telanaipura', 'Jambi Timur'],
            datasets: [{
                label: 'Non-Pelanggan',
                data: [20, 35, 5, 20, 10, 5, 10],  // Data statis sementara
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',  // Membuat grafik batang horizontal
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'Non-Customer di Berbagai Kecamatan di Jambi',
                    font: {
                        size: 20  // Ganti ukuran font sesuai keinginan
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });

    // Membuat chart untuk pelanggan Non-Indibiz
    const ctxNewChart = document.getElementById('newChart').getContext('2d');
    const newChart = new Chart(ctxNewChart, {
        type: 'pie',
        data: {
            labels: ['Sekolah', 'Ruko', 'Hotel', 'MultiFinance', 'Health', 'Ekspedisi', 'Energy'],
            datasets: [{
                data: [
                    countDataBySegmen('Non-Customer', 'Sekolah'),
                    countDataBySegmen('Non-Customer', 'Ruko'),
                    countDataBySegmen('Non-Customer', 'Hotel'),
                    countDataBySegmen('Non-Customer', 'MultiFinance'),
                    countDataBySegmen('Non-Customer', 'Health'),
                    countDataBySegmen('Non-Customer', 'Ekspedisi'),
                    countDataBySegmen('Non-Customer', 'Energy')
                ],
                backgroundColor: [                    
                    '#FF6384', // Warna untuk Indibiz Sekolah
                '#36A2EB', // Warna untuk Indibiz Ruko
                '#FFCE56', // Warna untuk Indibiz Hotel
                '#FF9F40', // Warna untuk Indibiz MultiFinance
                '#4BC0C0', // Warna untuk Indibiz Health
                '#9966FF', // Warna untuk Indibiz Ekspedisi
                '#333'  // Warna untuk Indibiz Energy
            ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                },
                title: {
                    display: true,
                    text: 'Non-Customer',
                    font: {
                        size: 20
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
    
});
