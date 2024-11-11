<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-2">
            <div class="row">
                <div class="ms-3 mt-3">
                    <h3 class="mb-0 h4 font-weight-bolder">Dashboard</h3>
                    <p class="mb-4">
                        information on number of products, number of customers, number of orders, amount not paid
                    </p>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Asset Product</p>
                                    <h4 class="mb-0">{{ $totalProduct }}</h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-primary shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">weekend</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Customer</p>
                                    <h4 class="mb-0">{{ $customerCount }}</h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-success shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">person</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-body p-3 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Done Transaction</p>
                                    <h4 class="mb-0">{{ $doneSalesCount }}</h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-info shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">leaderboard</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-body p-3 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">Pending Transaction</p>
                                    <h4 class="mb-0">{{ $pendingSalesCount }}</h4>
                                </div>
                                <div
                                    class="icon icon-md icon-shape bg-gradient-warning shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">weekend</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <h6 class="mb-0 ">Website Views</h6>
                      <p class="text-sm ">Last Campaign Performance</p>
                      <div class="pe-2">
                        <div class="chart">
                          <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                        </div>
                      </div>
                      <hr class="dark horizontal">
                      <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                  <div class="card ">
                    <div class="card-body">
                      <h6 class="mb-0 "> Daily Sales </h6>
                      <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. </p>
                      <div class="pe-2">
                        <div class="chart">
                          <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                        </div>
                      </div>
                      <hr class="dark horizontal">
                      <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm"> updated 4 min ago </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 mt-4 mb-3">
                  <div class="card">
                    <div class="card-body">
                      <h6 class="mb-0 ">Completed Tasks</h6>
                      <p class="text-sm ">Last Campaign Performance</p>
                      <div class="pe-2">
                        <div class="chart">
                          <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                        </div>
                      </div>
                      <hr class="dark horizontal">
                      <div class="d-flex ">
                        <i class="material-symbols-rounded text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm">just updated</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="row mt-4">
                <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Officer Information</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Admin</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Member</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Budget</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Completion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle me-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anggota 1">
                                                            <img src="../assets/img/team-1.jpg" alt="anggota1">
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Finance Officer</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anggota 1">
                                                        <img src="../assets/img/team-1.jpg" alt="anggota1">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anggota 2">
                                                        <img src="../assets/img/team-2.jpg" alt="anggota2">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> Rp 50,000,000 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">75%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle me-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anggota 2">
                                                            <img src="../assets/img/team-2.jpg" alt="anggota2">
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Head of Development</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anggota 3">
                                                        <img src="../assets/img/team-3.jpg" alt="anggota3">
                                                    </a>
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anggota 4">
                                                        <img src="../assets/img/team-4.jpg" alt="anggota4">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> Rp 100,000,000 </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">50%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-info w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <a href="javascript:;" class="avatar avatar-xs rounded-circle me-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anggota 4">
                                                            <img src="../assets/img/team-4.jpg" alt="anggota4">
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">Kasi Perencanaan</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group mt-2">
                                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Anggota 5">
                                                        <img src="../assets/img/team-5.jpg" alt="anggota5">
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold"> Not set </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="progress-wrapper w-75 mx-auto">
                                                    <div class="progress-info">
                                                        <div class="progress-percentage">
                                                            <span class="text-xs font-weight-bold">100%</span>
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <h6>Orders overview</h6>
                            <p class="text-sm">
                                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                                <span class="font-weight-bold">24%</span> this month
                            </p>
                        </div>
                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i
                                            class="material-symbols-rounded text-success text-gradient">notifications</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-danger text-gradient">code</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-info text-gradient">shopping_cart</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April
                                        </h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-warning text-gradient">credit_card</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
                                            #4395133</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                                    </div>
                                </div>
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-primary text-gradient">key</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
                                            development</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                                    </div>
                                </div>
                                <div class="timeline-block">
                                    <span class="timeline-step">
                                        <i class="material-symbols-rounded text-dark text-gradient">payments</i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");
    
        new Chart(ctx, {
          type: "bar",
          data: {
            labels: ["M", "T", "W", "T", "F", "S", "S"],
            datasets: [{
              label: "Views",
              tension: 0.4,
              borderWidth: 0,
              borderRadius: 4,
              borderSkipped: false,
              backgroundColor: "#43A047",
              data: [50, 45, 22, 28, 50, 60, 76],
              barThickness: 'flex'
            }, ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false,
              }
            },
            interaction: {
              intersect: false,
              mode: 'index',
            },
            scales: {
              y: {
                grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [5, 5],
                  color: '#e5e5e5'
                },
                ticks: {
                  suggestedMin: 0,
                  suggestedMax: 500,
                  beginAtZero: true,
                  padding: 10,
                  font: {
                    size: 14,
                    lineHeight: 2
                  },
                  color: "#737373"
                },
              },
              x: {
                grid: {
                  drawBorder: false,
                  display: false,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderDash: [5, 5]
                },
                ticks: {
                  display: true,
                  color: '#737373',
                  padding: 10,
                  font: {
                    size: 14,
                    lineHeight: 2
                  },
                }
              },
            },
          },
        });
    
    
        var ctx2 = document.getElementById("chart-line").getContext("2d");
    
        new Chart(ctx2, {
          type: "line",
          data: {
            labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
            datasets: [{
              label: "Sales",
              tension: 0,
              borderWidth: 2,
              pointRadius: 3,
              pointBackgroundColor: "#43A047",
              pointBorderColor: "transparent",
              borderColor: "#43A047",
              backgroundColor: "transparent",
              fill: true,
              data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
              maxBarThickness: 6
    
            }],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false,
              },
              tooltip: {
                callbacks: {
                  title: function(context) {
                    const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                    return fullMonths[context[0].dataIndex];
                  }
                }
              }
            },
            interaction: {
              intersect: false,
              mode: 'index',
            },
            scales: {
              y: {
                grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [4, 4],
                  color: '#e5e5e5'
                },
                ticks: {
                  display: true,
                  color: '#737373',
                  padding: 10,
                  font: {
                    size: 12,
                    lineHeight: 2
                  },
                }
              },
              x: {
                grid: {
                  drawBorder: false,
                  display: false,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderDash: [5, 5]
                },
                ticks: {
                  display: true,
                  color: '#737373',
                  padding: 10,
                  font: {
                    size: 12,
                    lineHeight: 2
                  },
                }
              },
            },
          },
        });
    
        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");
    
        new Chart(ctx3, {
          type: "line",
          data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
              label: "Tasks",
              tension: 0,
              borderWidth: 2,
              pointRadius: 3,
              pointBackgroundColor: "#43A047",
              pointBorderColor: "transparent",
              borderColor: "#43A047",
              backgroundColor: "transparent",
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6
    
            }],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false,
              }
            },
            interaction: {
              intersect: false,
              mode: 'index',
            },
            scales: {
              y: {
                grid: {
                  drawBorder: false,
                  display: true,
                  drawOnChartArea: true,
                  drawTicks: false,
                  borderDash: [4, 4],
                  color: '#e5e5e5'
                },
                ticks: {
                  display: true,
                  padding: 10,
                  color: '#737373',
                  font: {
                    size: 14,
                    lineHeight: 2
                  },
                }
              },
              x: {
                grid: {
                  drawBorder: false,
                  display: false,
                  drawOnChartArea: false,
                  drawTicks: false,
                  borderDash: [4, 4]
                },
                ticks: {
                  display: true,
                  color: '#737373',
                  padding: 10,
                  font: {
                    size: 14,
                    lineHeight: 2
                  },
                }
              },
            },
          },
        });
      </script>
</x-layout>
