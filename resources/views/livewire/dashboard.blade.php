 <main class="main-content">
     <div class="container-fluid py-4">
         <div class="row">
             <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                 <div class="card">
                     <div class="card-body p-3">
                         <div class="row">
                             <div class="col-8">
                                 <div class="numbers">
                                     <p class="text-sm mb-0 text-capitalize font-weight-bold">Numero de clientes</p>
                                     <h5 class="font-weight-bolder mb-0">
                                         {{ $clientes->count() }}
                                         {{-- <span class="text-success text-sm font-weight-bolder">+55%</span> --}}
                                     </h5>
                                 </div>
                             </div>
                             <div class="col-4 text-end">
                                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                     <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     {{-- <div class="row mt-4">
             <div class="col-lg-7 mb-lg-0 mb-4">
                 <div class="card">
                     <div class="card-body p-3">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="d-flex flex-column h-100">
                                     <p class="mb-1 pt-2 text-bold">Built by developers</p>
                                     <h5 class="font-weight-bolder">Scrath me</h5>
                                     <p class="mb-5">From colors, cards, typography to complex elements, you will find
                                         the full documentation.</p>
                                     <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                         href="javascript:;">
                                         Read More
                                         <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                     </a>
                                 </div>
                             </div>
                             <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                 <div class="bg-gradient-primary border-radius-lg h-100">
                                     <img src="../assets/img/shapes/waves-white.svg"
                                         class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                     <div
                                         class="position-relative d-flex align-items-center justify-content-center h-100">
                                         <img class="w-100 position-relative z-index-2 pt-4"
                                             src="/assets/img/illustrations/warning-rocket.png">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-5">
                 <div class="card h-100 p-3">
                     <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                         style="background-image: url('../assets/img/ivancik.jpg');">
                         <span class="mask bg-gradient-dark"></span>
                         <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                             <h5 class="text-white font-weight-bolder mb-4 pt-2">Work with the rockets</h5>
                             <p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It is
                                 all about who take the opportunity first.</p>
                             <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                 href="javascript:;">
                                 Read More
                                 <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
         </div> --}}
     <div class='card'>
         <div class="card-body px-0 pb-2">
             <div class="table-responsive">
                 <table class="table align-items-center mb-0">
                     <thead>
                         <tr>
                             <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                 Id
                             </th>
                             <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                 Nombre</th>
                             <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                 Secret</th>
                             <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                 redirect
                             </th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($clientes as $cliente)
                             <tr>
                                 <td>
                                     <div class="d-flex px-2 py-1">
                                         <div class="d-flex flex-column justify-content-center">
                                             <h6 class="mb-0 text-sm">{{ $cliente->id }}</h6>
                                         </div>
                                     </div>
                                 </td>
                                 <td>
                                     <div class="d-flex px-2 py-1">
                                         {{-- <div>
                                      <img src="../storage/img/finance.svg"
                                          class="avatar avatar-sm me-3">
                                  </div> --}}
                                         <div class="d-flex flex-column justify-content-center">
                                             <h6 class="mb-0 text-sm">{{ $cliente->name }}</h6>
                                         </div>
                                     </div>
                                 </td>

                                 <td class="align-middle text-center text-sm">
                                     <span class="text-xs font-weight-bold"> {{ $cliente->secret }} </span>
                                 </td>
                                 <td class="align-middle text-center text-sm">
                                     <span class="text-xs font-weight-bold">
                                         {{ $cliente->redirect }}
                                     </span>
                                 </td>
                                 <td class="align-middle">
                                     {{-- <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                      <a type="button" href="{{ route('status') }}"
                                          class="btn btn-info">Ver reporte</a>
                                  </div>
                              </div> --}}

                                 </td>
                             </tr>
                         @endforeach

                     </tbody>
                 </table>
             </div>
         </div>
     </div>

 </main>

 <!--   Core JS Files   -->
 <script src="../assets/js/plugins/chartjs.min.js"></script>
 <script src="../assets/js/plugins/Chart.extension.js"></script>
 <script>
     var ctx = document.getElementById("chart-bars").getContext("2d");

     new Chart(ctx, {
         type: "bar",
         data: {
             labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
             datasets: [{
                 label: "Sales",
                 tension: 0.4,
                 borderWidth: 0,
                 pointRadius: 0,
                 backgroundColor: "#fff",
                 data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                 maxBarThickness: 6
             }, ],
         },
         options: {
             responsive: true,
             maintainAspectRatio: false,
             legend: {
                 display: false,
             },
             tooltips: {
                 enabled: true,
                 mode: "index",
                 intersect: false,
             },
             scales: {
                 yAxes: [{
                     gridLines: {
                         display: false,
                     },
                     ticks: {
                         suggestedMin: 0,
                         suggestedMax: 500,
                         beginAtZero: true,
                         padding: 0,
                         fontSize: 14,
                         lineHeight: 3,
                         fontColor: "#fff",
                         fontStyle: 'normal',
                         fontFamily: "Open Sans",
                     },
                 }, ],
                 xAxes: [{
                     gridLines: {
                         display: false,
                     },
                     ticks: {
                         display: false,
                         padding: 20,
                     },
                 }, ],
             },
         },
     });

     var ctx2 = document.getElementById("chart-line").getContext("2d");

     var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

     gradientStroke1.addColorStop(1, 'rgba(253,235,173,0.4)');
     gradientStroke1.addColorStop(0.2, 'rgba(245,57,57,0.0)');
     gradientStroke1.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors

     var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

     gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.4)');
     gradientStroke2.addColorStop(0.2, 'rgba(245,57,57,0.0)');
     gradientStroke2.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors


     new Chart(ctx2, {
         type: "line",
         data: {
             labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
             datasets: [{
                     label: "Mobile apps",
                     tension: 0.4,
                     borderWidth: 0,
                     pointRadius: 0,
                     borderColor: "#fbcf33",
                     borderWidth: 3,
                     backgroundColor: gradientStroke1,
                     data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                     maxBarThickness: 6

                 },
                 {
                     label: "Websites",
                     tension: 0.4,
                     borderWidth: 0,
                     pointRadius: 0,
                     borderColor: "#f53939",
                     borderWidth: 3,
                     backgroundColor: gradientStroke2,
                     data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                     maxBarThickness: 6

                 },
             ],
         },
         options: {
             responsive: true,
             maintainAspectRatio: false,
             legend: {
                 display: false,
             },
             tooltips: {
                 enabled: true,
                 mode: "index",
                 intersect: false,
             },
             scales: {
                 yAxes: [{
                     gridLines: {
                         borderDash: [2],
                         borderDashOffset: [2],
                         color: '#dee2e6',
                         zeroLineColor: '#dee2e6',
                         zeroLineWidth: 1,
                         zeroLineBorderDash: [2],
                         drawBorder: false,
                     },
                     ticks: {
                         suggestedMin: 0,
                         suggestedMax: 500,
                         beginAtZero: true,
                         padding: 10,
                         fontSize: 11,
                         fontColor: '#adb5bd',
                         lineHeight: 3,
                         fontStyle: 'normal',
                         fontFamily: "Open Sans",
                     },
                 }, ],
                 xAxes: [{
                     gridLines: {
                         zeroLineColor: 'rgba(0,0,0,0)',
                         display: false,
                     },
                     ticks: {
                         padding: 10,
                         fontSize: 11,
                         fontColor: '#adb5bd',
                         lineHeight: 3,
                         fontStyle: 'normal',
                         fontFamily: "Open Sans",
                     },
                 }, ],
             },
         },
     });
 </script>
