@extends('layouts/main')

@section('mainClass')

{{-- @push('cs')
@vite(['resources/js/realtimeChart1.js', 'resources/js/realtimeChart2.js']) --}}

<div class="flex flex-wrap -mx-3 mb-4">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/4 max-w-full px-3">
              <div>
                <p class="mb-1 font-sans font-semibold leading-normal text-sm dark:text-white">Server address</p>
                <p class="mb-0 font-bold dark:text-gray-300" style="font-size: 0.785rem;">
                  @if(isset($data_livetest2["server_address"]))
                      {{ $data_livetest2["server_address"] }}
                      {{-- <span class="leading-normal text-sm font-weight-bolder text-lime-500">+55%</span> --}}
                  @else
                      -
                  @endif
                </p>
              </div>
            </div>
            <div class="px-3 text-right basis-1/4">
              <!-- Form untuk Delete -->
              <form action="{{ route('data_livetest.destroy') }}" method="POST" class="inline-block">
                @method('DELETE')
                @csrf
                <input type="hidden" name="server_address" value="{{ $data_livetest2 ? $data_livetest2->server_address : 'null' }}">
                <button type="submit" onclick="return confirm('Anda akan menghapus data, apakah Anda yakin?')" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm text-center mt-3">
                    <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0"/>
                    </svg>
                </button>
              </form>
            </div>
            <div class="px-3 text-right basis-1/4">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-500 to-blue-400">
                {{-- <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"> --}}
                  <svg class="w-[30px] h-[30px] text-gray-800 text-white ml-2 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4c.6 0 1-.4 1-1v-1a3 3 0 0 0-3-3h-2m-2.2-4A3 3 0 0 0 19 8a3 3 0 0 0-5.2-2M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  </svg>
                {{-- </i> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm dark:text-white">Connection Count</p>
                <h5 class="mb-0 font-bold dark:text-gray-300">
                  {{-- <input type="hidden" name="server_address" value="{{ $data_livetest->server_address }}"> --}}
                  @if(isset($input_livetest2->connection_count))
                    {{ $input_livetest2->connection_count }}
                      {{-- <span class="leading-normal text-sm font-weight-bolder text-lime-500 ml-2">+55%</span> --}}
                  @else
                      - 
                  @endif
                  
                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-500 to-blue-400">
                {{-- <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i> --}}
                <svg class="w-[30px] h-[30px] text-gray-800 text-white ml-2 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12v4m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 0v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V8m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm dark:text-white">Request Count</p>
                <h5 class="mb-0 font-bold dark:text-gray-300">
                  @if(isset($input_livetest2->request_count))
                      {{ $input_livetest2->request_count }} 
                      {{-- <span class="leading-normal text-sm font-weight-bolder text-lime-500 ">+55%</span> --}}
                  @else
                      - 
                  @endif
                </h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-500 to-blue-400">
                {{-- <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i> --}}
                <svg class="w-[30px] h-[30px] text-gray-800 text-white ml-2 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6s0 0 0 0v-.5A5.5 5.5 0 0 0 7.2 9H7a4 4 0 1 0 0 8h2.2m2.8 2v-9m0 0-2 2m2-2 2 2"/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card4 -->
    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/4 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm mb-1 dark:text-white" style="font-size: 8pt">Status Connection</p>
                
                <h5 class="mb-0 font-bold">
                @if(isset($input_livetest3["status_connect"]) && $input_livetest3["status_connect"] == 1)
                      {{-- {{ $data_livetest->input_livetest->status_connect }} --}}
                      <span class="bg-green-300 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Running</span>
                @else
                      {{-- {{ $data_livetest->input_livetest->status_connect }} --}}
                      <span class="bg-red-300 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Stoped</span>
                @endif
                </h5>
              </div>
            </div>
            <div class="px-2 ml-2 py-4 text-center basis-1/4">
              <a href="/realtimeTest">
                <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                </svg>
              </a>
            </div>
            <div class="px-3 text-right basis-1/4">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-500 to-blue-400">
                {{-- <i class="ni leading-none ni-cart text-lg relative top-3.5 text-white"></i> --}}
                <svg class="w-[30px] h-[30px] text-gray-800 text-white ml-2 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 3-17.5m-8 6 4 4L19.3 5M17 14v6m-3-3h6"/>
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border dark:bg-gray-800 mb-4 ">
  <div class="flex items-center justify-between">
    <h3 class="mt-2 mb-2 ml-4 font-sans font-semibold dark:text-white">Download View</h3>
    <a id="tombol-download2" href="javascript:void(0);">
      <svg class="mr-4 w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2m-1-5-4 5-4-5m9 8h.01"/>
      </svg>
    </a>    
  </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-2 mb-4">
  
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
  <canvas id="myChart"></canvas>
  </div>
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
  <canvas id="myChart2"></canvas>
  </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-2 mb-4">
  
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
  <canvas id="myChart3"></canvas>
  </div>
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
  <canvas id="myChart4"></canvas>
  </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-2 mb-2">
  
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
  <canvas id="myChart5"></canvas>
  </div>
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
  <canvas id="myChart6"></canvas>
  </div>

</div>

<div class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 dark:bg-gray-800">
  <h1 class="mt-2 mb-2 ml-2 font-sans font-semibold dark:text-white">Perbandingan Tools Pengukuran</h1>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-2 mb-2">
  
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
    <h3 class="mt-2 mb-2 ml-2 font-sans font-semibold">Connection Time (ms)</h3>
    <canvas id="myChart7"></canvas>
    <div class="flex justify-center">
      <p class="mt-2 mb-2 font-sans">50 Concurrent (Request/sec)</p>
    </div>
  </div>
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
    <h3 class="mt-2 mb-2 ml-2 font-sans font-semibold">Connection Time (ms)</h3>
    <canvas id="myChart8"></canvas>
    <div class="flex justify-center">
      <p class="mt-2 mb-2 font-sans">100 Concurrent (Request/sec)</p>
    </div>
  </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-2 mb-2">
  
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
    <h3 class="mt-2 mb-2 ml-2 font-sans font-semibold">Troughput (Kbps)</h3>
    <canvas id="myChart9"></canvas>
    <div class="flex justify-center">
      <p class="mt-2 mb-2 font-sans">50 Concurrent (Request/sec)</p>
    </div>
  </div>
  <div
      class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border mb-4 "
  >
    <h3 class="mt-2 mb-2 ml-2 font-sans font-semibold">Troughput (Kbps)</h3>
    <canvas id="myChart10"></canvas>
    <div class="flex justify-center">
      <p class="mt-2 mb-2 font-sans">100 Concurrent (Request/sec)</p>
    </div>
  </div>

</div>

<div class="border-2 border-dashed rounded-lg border-gray-100 dark:border-gray-800 h-32 mb-4">
  <div class="w-full" style="visibility: hidden">
    <label for="user_id_live" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Id</label>
    <div type="number" name="user_id_live" id="user_id_live" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">{{ $dataUserId }}</div>
  </div>
</div>



@push('js')
<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js"></script>

{{-- <!-- Pada halaman HTML sisi client -->
<script type="module"></script> --}}
<script>
const socket = io.connect('https://server-io-bhhbpeznua-as.a.run.app');
// const socket = io.connect('http://localhost:3000');

// Ambil nilai $dataUserId dari elemen HTML
const dataUserIdElement = document.getElementById('user_id_live');
const dataUserId = dataUserIdElement ? dataUserIdElement.textContent : '';

// Kirim dataUserId ke server Socket.IO saat halaman dimuat
socket.emit('sendDataUserId', dataUserId);

// Tambahkan listener untuk mengonfirmasi penerimaan data di server
socket.on('dataUserIdAcknowledged', () => {
    console.log('Data user ID telah dikirim ke server dan diakui.');
});

// chart untuk connection times
const labelsArray = [];
const dataArray = [];
let latestId = 0; // Menyimpan ID data terakhir yang diterima

const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: labelsArray,
        datasets: [{
            label: 'Connection Time (ms)',
            data: dataArray,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        scales: {
            x: {
                display: false // Menyembunyikan label tanggal pada sumbu x
            },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        // Mengatur nilai maksimum yang ditampilkan
                        const maxValue = Math.max(...dataArray);
                        return value <= Math.max(500, maxValue) ? value : null;
                    }
                },
                suggestedMax: 500, // Nilai maksimum yang disarankan
            }
        }
    }
});

//chart untuk request per second
const dataArray2 = [];

const ctx2 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: labelsArray,
        datasets: [{
            label: 'Request per Second (req/s)',
            data: dataArray2,
            borderColor: 'rgba(75, 19, 122, 1)',
            backgroundColor: 'rgba(75, 19, 122, 1)',
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        scales: {
            x: {
                display: false // Menyembunyikan label tanggal pada sumbu x
            },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        // Mengatur nilai maksimum yang ditampilkan
                        const maxValue2 = Math.max(...dataArray2);
                        return value <= Math.max(500, maxValue2) ? value : null;
                    }
                },
                suggestedMax: 500, // Nilai maksimum yang disarankan
            }
        }
    }
});

//chart untuk transfer rate
const dataArray3 = [];

const ctx3 = document.getElementById('myChart3').getContext('2d');
const myChart3 = new Chart(ctx3, {
    type: 'line',
    data: {
        labels: labelsArray,
        datasets: [{
            label: 'Transfer Rate (Kbps)',
            data: dataArray3,
            borderColor: 'rgba(75, 192, 19, 1)',
            backgroundColor: 'rgba(75, 192, 19, 1)',
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        scales: {
            x: {
                display: false // Menyembunyikan label tanggal pada sumbu x
            },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        // Mengatur nilai maksimum yang ditampilkan
                        const maxValue3 = Math.max(...dataArray3);
                        return value <= Math.max(500, maxValue3) ? value : null;
                    }
                },
                suggestedMax: 500, // Nilai maksimum yang disarankan
            }
        }
    }
});

//chart untuk time per request
const dataArray4 = [];

const ctx4 = document.getElementById('myChart4').getContext('2d');
const myChart4 = new Chart(ctx4, {
    type: 'line',
    data: {
        labels: labelsArray,
        datasets: [{
            label: 'Time per Request (ms)',
            data: dataArray4,
            borderColor: 'rgb(0, 0, 205)',
            backgroundColor: 'rgb(0, 0, 205)',
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        scales: {
            x: {
                display: false // Menyembunyikan label tanggal pada sumbu x
            },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        // Mengatur nilai maksimum yang ditampilkan
                        const maxValue4 = Math.max(...dataArray4);
                        return value <= Math.max(500, maxValue4) ? value : null;
                    }
                },
                suggestedMax: 500, // Nilai maksimum yang disarankan
            }
        }
    }
});

//chart untuk time per request
const dataArray5 = [];

const ctx5 = document.getElementById('myChart5').getContext('2d');
const myChart5 = new Chart(ctx5, {
    type: 'line',
    data: {
        labels: labelsArray,
        datasets: [{
            label: 'Request Loss (%)',
            data: dataArray5,
            borderColor: 'rgb(255, 255, 0)',
            backgroundColor: 'rgb(255, 255, 0)',
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        scales: {
            x: {
                display: false // Menyembunyikan label tanggal pada sumbu x
            }
        }
    }
});

//chart untuk time taken for test
const dataArray6 = [];

const ctx6 = document.getElementById('myChart6').getContext('2d');
const myChart6 = new Chart(ctx6, {
    type: 'line',
    data: {
        labels: labelsArray,
        datasets: [{
            label: 'Time Testing (s)',
            data: dataArray6,
            borderColor: 'rgb(249, 0, 255)',
            backgroundColor: 'rgb(249, 0, 255)',
            borderWidth: 1,
            fill: false
        }]
    },
    options: {
        scales: {
            x: {
                display: false // Menyembunyikan label tanggal pada sumbu x
            },
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        // Mengatur nilai maksimum yang ditampilkan
                        const maxValue5 = Math.max(...dataArray6);
                        return value <= Math.max(500, maxValue5) ? value : null;
                    }
                },
                suggestedMax: 500, // Nilai maksimum yang disarankan
            }
        }
    }
});


socket.on('data', (data) => {
    // console.log('Received data from server:', data);

    // Mengupdate data pada chart hanya jika data memiliki ID lebih besar dari yang terakhir diterima
    const newDataArray = data.filter(newData => newData.id > latestId);
    if (newDataArray.length > 0) {
        updateChart(newDataArray);
        latestId = Math.max(...data.map(item => item.id)); // Mengupdate ID terakhir
    }
});

function formatDateTime(dateTimeString) {
    const date = new Date(dateTimeString);

    // Mendapatkan bagian-bagian tanggal
    const year = date.getFullYear(); // Mendapatkan dua digit terakhir tahun
    const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Mendapatkan bulan (di-start dari 0)
    const day = date.getDate().toString().padStart(2, '0'); // Mendapatkan hari

    // Mendapatkan bagian-bagian waktu
    const hours = date.getHours().toString().padStart(2, '0');
    const minutes = date.getMinutes().toString().padStart(2, '0');
    const seconds = date.getSeconds().toString().padStart(2, '0');

    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

function updateChart(newDataArray) {
    // console.log('Updating chart with data:', newDataArray);

    newDataArray.forEach(newData => {
        if ('created_at' in newData && 'connection_time' in newData && 'request_second' in newData && 'transfer_rate' in newData && 'time_request' in newData && 'request_loss' in newData && 'time_taken' in newData) {
            const formattedDateTime = formatDateTime(newData.created_at);
            // const formattedDateTime = newData.created_at;
            const connectionTime = newData.connection_time;
            const requestSecond = newData.request_second;
            const transferRate = newData.transfer_rate;
            const timeRequest = newData.time_request;
            const requestLoss = newData.request_loss;
            const timeTaken = newData.time_taken;

            labelsArray.push(formattedDateTime);
            dataArray.push(connectionTime);
            dataArray2.push(requestSecond);
            dataArray3.push(transferRate);
            dataArray4.push(timeRequest);
            dataArray5.push(requestLoss);
            dataArray6.push(timeTaken);

            // Memastikan jumlah data tidak melebihi batas tertentu (misalnya 15 data)
            const maxLength = 80;
            while (labelsArray.length > maxLength) {
                labelsArray.shift();
                dataArray.shift();
                dataArray2.shift();
                dataArray3.shift();
                dataArray4.shift();
                dataArray5.shift();
                dataArray6.shift();
            }
        } else {
            console.error('Invalid data format received from server:', newData);
        }
    });

    // Mengupdate chart dengan data terbaru
    myChart.data.labels = labelsArray;
    myChart.data.datasets[0].data = dataArray;
    myChart2.data.datasets[0].data = dataArray2;
    myChart3.data.datasets[0].data = dataArray3;
    myChart4.data.datasets[0].data = dataArray4;
    myChart5.data.datasets[0].data = dataArray5;
    myChart6.data.datasets[0].data = dataArray6;
    myChart.update();
    myChart2.update();
    myChart3.update();
    myChart4.update();
    myChart5.update();
    myChart6.update();
}



//chart untuk connection times
const dataPengukuran1 = [{x: '100 connection', net: 30, cogs: 15.7}, {x: '250 connection', net: 22, cogs: 24.34}];

const ctx100 = document.getElementById('myChart7').getContext('2d');
const myChart7 = new Chart(ctx100, {
    type: 'bar',
    data: {
        labels: ['100 connection', '250 connection'],
        datasets: [{
            label: 'Apache Bench',
            data: dataPengukuran1.map(entry => entry.net)
        }, {
            label: 'Httperf',
            data: dataPengukuran1.map(entry => entry.cogs)
        }]
    },
    options: {
    scales: {
        y: {
            min: 0, // Nilai minimum sumbu y
            max: 35, // Nilai maksimum sumbu y
        }
        }
    }
});

const dataPengukuran2 = [{x: '500 connection', net: 80, cogs: 51.76}, {x: '1000 connection', net: 68.67, cogs: 38.73}];

const ctx101 = document.getElementById('myChart8').getContext('2d');
const myChart8 = new Chart(ctx101, {
    type: 'bar',
    data: {
        labels: ['500 connection', '1000 connection'],
        datasets: [{
            label: 'Apache Bench',
            data: dataPengukuran2.map(entry => entry.net)
        }, {
            label: 'Httperf',
            data: dataPengukuran2.map(entry => entry.cogs)
        }]
    },
    options: {
    scales: {
        y: {
            min: 0, // Nilai minimum sumbu y
            max: 90, // Nilai maksimum sumbu y
        }
        }
    }
});

//chart untuk Troughput
const dataPengukuran3 = [{x: '100 connection', net: 316.46, cogs: 55.73}, {x: '250 connection', net: 289.34, cogs: 55.5}];

const ctx102 = document.getElementById('myChart9').getContext('2d');
const myChart9 = new Chart(ctx102, {
    type: 'bar',
    data: {
        labels: ['100 connection', '250 connection'],
        datasets: [{
            label: 'Apache Bench',
            data: dataPengukuran3.map(entry => entry.net)
        }, {
            label: 'Httperf',
            data: dataPengukuran3.map(entry => entry.cogs)
        }]
    },
    options: {
    scales: {
        y: {
            min: 0, // Nilai minimum sumbu y
            max: 350, // Nilai maksimum sumbu y
        }
        }
    }
});

const dataPengukuran4 = [{x: '500 connection', net: 301.4, cogs: 110.76}, {x: '1000 connection', net: 366.32, cogs: 111.7}];

const ctx103 = document.getElementById('myChart10').getContext('2d');
const myChart10 = new Chart(ctx103, {
    type: 'bar',
    data: {
        labels: ['500 connection', '1000 connection'],
        datasets: [{
            label: 'Apache Bench',
            data: dataPengukuran4.map(entry => entry.net)
        }, {
            label: 'Httperf',
            data: dataPengukuran4.map(entry => entry.cogs)
        }]
    },
    options: {
    scales: {
        y: {
            min: 0, // Nilai minimum sumbu y
            max: 400, // Nilai maksimum sumbu y
        }
        }
    }
});

</script>

<script>
//fitur dark mode
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark')
}

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<script>
  document.getElementById('tombol-download2').addEventListener('click', function () {
      html2canvas(document.body, {
          onrendered: function (canvas) {
              var imgData2 = canvas.toDataURL('image/png');
              var pdf = new jsPDF('p', 'mm', 'a4');
              var imgWidth2 = 210; 
              var pageHeight2 = 295;  
              var imgHeight2 = canvas.height * imgWidth2 / canvas.width;
              var heightLeft2 = imgHeight2;

              var position2 = 0;

              pdf.addImage(imgData2, 'PNG', 0, position2, imgWidth2, imgHeight2);
              heightLeft2 -= pageHeight2;

              while (heightLeft2 >= 0) {
                  position2 = heightLeft2 - imgHeight2;
                  pdf.addPage();
                  pdf.addImage(imgData2, 'PNG', 0, position2, imgWidth2, imgHeight2);
                  heightLeft2 -= pageHeight2;
              }
              pdf.save('download_view_realtime.pdf');
          }
      });
  });
</script>

@endpush

@endsection