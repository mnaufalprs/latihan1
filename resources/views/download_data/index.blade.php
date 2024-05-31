@extends('layouts/main')

@section('mainClass')

<div class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border dark:bg-gray-800 mb-4 ">
    <div class="flex items-center justify-between">
      <h1 class="mt-2 mb-2 ml-4 font-sans font-semibold dark:text-white">Load Balance Testing</h1>
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-4">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-1 font-sans font-semibold leading-normal text-sm dark:text-white">Server address</p>
                <p class="mb-0 font-bold dark:text-gray-300" style="font-size: 0.785rem;">
                  @if(isset($data_loadtest_dwd["server_address"]))
                      {{ $data_loadtest_dwd["server_address"] }}
                  @else
                      -
                  @endif
                </p>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
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
                <p class="mb-0 font-sans font-semibold leading-normal text-sm dark:text-white" style="font-size: 9pt">Time Measurement</p>
                <p class="mt-2 font-sans font-semibold leading-normal text-xs dark:text-gray-300">
                  @if(isset($data_loadtest_dwd["created_at"]))
                      {{ $data_loadtest_dwd["created_at"] }}
                  @else
                      -
                  @endif
                </p>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-500 to-blue-400">
                <svg class="w-[30px] h-[30px] text-gray-800 text-white ml-2 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
        <div class="flex-auto p-4">
          <div class="flex flex-row items-center justify-between">
            <div>
              <!-- Dropdown menu -->
              <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                </svg>
                Data Pengukuran
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
              </button>
              <div id="dropdownRadio" class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                  <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="filter-radio-example-1" for="dropdownRadio-1" type="radio" value="1" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="filter-radio-example-1" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300 whitespace-nowrap">Pengukuran ke-1</label>
                    </div>
                  </li>
                  <!-- tambahkan item dropdown radio yang lain di sini -->
                  <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="filter-radio-example-2" for="dropdownRadio-2" type="radio" value="2" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="filter-radio-example-2" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300 whitespace-nowrap">Pengukuran ke-2</label>
                    </div>
                  </li>
                  <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                      <input id="filter-radio-example-3" for="dropdownRadio-3" type="radio" value="3" name="filter-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                      <label for="filter-radio-example-3" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300 whitespace-nowrap">Pengukuran ke-3</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>

            <div class="px-3 text-right basis-1/3">
                <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-500 to-blue-400">
                  {{-- <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i> --}}
                  <svg class="w-[30px] h-[30px] text-gray-800 text-white ml-2 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                  </svg>                  
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card4 -->
    <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 mb-6">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
          <div class="flex-auto p-4">
              <div class="flex flex-col items-center justify-center -mx-3">
                  <div class="w-full ml-4">
                      <!-- fitur tombol download -->
                      <form id="downloadForm" method="post" action="{{ route('documents.download') }}" class="d-inline">
                          @csrf
                          <input type="hidden" id="urutanPengukuran" name="urutan_pengukuran">
                          <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Download Data</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
    
</div>

<div class="grid border-black/12.5 shadow-soft-xl relative flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border dark:bg-gray-800 mb-4">
    <div class="flex items-center justify-between">
      <h1 class="mt-2 mb-2 ml-4 font-sans font-semibold dark:text-white">Realtime Testing</h1>
    </div>
</div>

<div class="flex flex-wrap -mx-3 mb-4">
  <!-- card1 -->
  <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
      <div class="flex-auto p-4">
        <div class="flex flex-row -mx-3">
          <div class="flex-none w-2/3 max-w-full px-3">
            <div>
              <p class="mb-1 font-sans font-semibold leading-normal text-sm dark:text-white">Server address</p>
              <p class="mb-0 font-bold dark:text-gray-300" style="font-size: 0.785rem;">
                @if(isset($data_livetest_dwd["server_address"]))
                    {{ $data_livetest_dwd["server_address"] }}
                @else
                    -
                @endif
              </p>
            </div>
          </div>
          <div class="px-3 text-right basis-1/3">
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
              <p class="mb-0 font-sans font-semibold leading-normal text-sm dark:text-white" style="font-size: 9pt">Time Measurement</p>
              <p class="mt-2 font-sans font-semibold leading-normal text-xs dark:text-gray-300">
                @if(isset($data_livetest_dwd["created_at"]))
                    {{ $data_livetest_dwd["created_at"] }}
                @else
                    -
                @endif
              </p>
            </div>
          </div>
          <div class="px-3 text-right basis-1/3">
            <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-purple-500 to-blue-400">
              <svg class="w-[30px] h-[30px] text-gray-800 text-white ml-2 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
              </svg>                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- card4 -->
  <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
    <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border dark:bg-gray-500">
        <div class="flex-auto p-4">
            <div class="flex flex-col items-center justify-center -mx-3">
                <div class="w-full ml-4">
                    <!-- fitur tombol download -->
                    <form id="downloadForm2" method="post" action="{{ route('documents.download2') }}" class="d-inline">
                        @csrf
                        {{-- <input type="hidden" id="urutanPengukuran" name="urutan_pengukuran"> --}}
                        <button type="submit" class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Download Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  
</div>

<div class="border-2 border-dashed rounded-lg border-gray-100 dark:border-gray-800 h-32 mb-4">
  <div class="w-full" style="visibility: hidden">
    
  </div>
</div>


@push('js')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const downloadForm = document.getElementById('downloadForm');
    const urutanPengukuranInput = document.getElementById('urutanPengukuran');
    const dropdownItems = document.querySelectorAll('#dropdownRadio input[type="radio"]');
    
    downloadForm.addEventListener('submit', function(event) {
        event.preventDefault();
        
        var urutanPengukuran;
        dropdownItems.forEach(function(item) {
            if (item.checked) {
                urutanPengukuran = item.value;
            }
        });
        
        if (!urutanPengukuran) {
            alert('Please select a measurement order from the dropdown.');
            return;
        }
        
        urutanPengukuranInput.value = urutanPengukuran;
        
        this.submit();
    });

    const urlParams = new URLSearchParams(window.location.search);
    const selectedValue = urlParams.get('urutan_pengukuran');
    
    if (selectedValue) {
        dropdownItems.forEach(function(item) {
            if (item.value === selectedValue) {
                item.checked = true;
            }
        });
    }

    dropdownItems.forEach(function(item) {
        item.addEventListener('change', function() {
            var selectedValue = this.value;
            window.location.href = window.location.pathname + '?urutan_pengukuran=' + selectedValue;
            console.log(selectedValue);
        });
    });
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

@endpush

@endsection