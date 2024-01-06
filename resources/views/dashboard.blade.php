<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }
    </style>
</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">STATITISKA</a>
            <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class=" mr-3"></i> 048-AgungBagus
            </button>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{ route('dashboard') }}" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Dashboard
            </a>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>Pengolahan Data
                    <i x-show="!open" class="fas fa-caret-down ml-auto"></i>
                    <i x-show="open" class="fas fa-caret-up ml-auto"></i>
                </button>
                <div x-show="open" class="pl-6">
                    <a href="{{url('/nilai')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Data Tunggal
                    </a>
                    <a href="{{url('/frekuensi')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Data Distribusi Frekuensi
                    </a>
                    <a href="{{url('/deskripsi')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Deskripsi Data
                    </a>
                    <a href="{{url('/databergolong')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Data Bergolong
                    </a>
                </div>   
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>Tabel Referensi
                    <i x-show="!open" class="fas fa-caret-down ml-auto"></i>
                    <i x-show="open" class="fas fa-caret-up ml-auto"></i>
                </button>
                <div x-show="open" class="pl-6">
                    <a href="{{url('/tabelChi')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Tabel Z Chi-Kuadrat
                    </a>
                    <a href="{{url('/liliefors')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Tabel Z Lilieferros
                    </a>
                </div> 
                <div x-data="{ open: false }">
                <button @click="open = !open" class="w-full flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                    <i class="fas fa-tachometer-alt mr-3"></i>Korelasi
                    <i x-show="!open" class="fas fa-caret-down ml-auto"></i>
                    <i x-show="open" class="fas fa-caret-up ml-auto"></i>
                </button>
                <div x-show="open" class="pl-6">
                    <a href="{{url('/Ttest')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Tabel Uji T
                    </a>
                    <a  href="{{url('/biserial')}}" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 nav-item">
                        <i class="fas fa-sticky-note mr-3"></i>
                        Biserial
                    </a>
                </div>   
            </div>
        </nav>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">

    <!-- ------------------------------------------------------------------------------------ -->
    <!-- ------------------------------------------------------------------------------------ -->
    <!-- ------------------------------------------------------------------------------------ -->
    
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-2">Card 1</h2>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-2">Card 2</h2>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-white rounded-lg shadow-md mt-8 p-6">
        <h2 class="text-xl font-semibold mb-4">Chart</h2>
        <img src="https://via.placeholder.com/500" alt="Chart" class="w-full">
    </div>
</div>

    </div>
    </body>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('dropdown', () => ({
            openRef: false,
        }));
    });
</script>

</html>