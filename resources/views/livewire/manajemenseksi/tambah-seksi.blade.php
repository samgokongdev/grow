<?php

use Livewire\Volt\Component;
use App\Models\Seksi;

new class extends Component {
    public $nama_seksi;
    public $openModal = false;

    public function toggle()
    {
        $this->openModal = !$this->openModal;
    }

    public function save()
    {
        $this->validate([
            'nama_seksi' => 'required|min:3|unique:seksis,nama_seksi',
        ]);

        $seksi_baru = Seksi::create([
            'nama_seksi' => $this->nama_seksi,
        ]);

        $this->openModal = !$this->openModal;
        $this->dispatch('seksiCreated', $seksi_baru->id);
    }
}; ?>

<div>
    <div class="max-w-2xl mx-auto mb-4">
        <button
            class="block text-white  bg-yellow-500 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "
            type="button" wire:click='toggle'>
            Tambah Seksi
        </button>
    </div>

    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="max-w-2xl mx-auto justify-center items-center max-h-full {{ !$openModal ? 'hidden' : '' }}">
        <div class="relative p-2 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Seksi Baru
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="mb-6">
                        <label for="success" class="block mb-2 text-sm font-medium ">Nama Seksi</label>
                        <input type="text" id="success" name="nama_seksi" wire:model='nama_seksi'
                            class="border text-sm rounded-lg block w-full p-2.5 focus:ring-2 focus:outline-none focus:ring-yellow-300 "
                            placeholder="Masukkan Nama Seksi atau Kelompok, Contoh : Seksi Pengawasan VI">
                        @error('nama_seksi')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">{{ $message }}</span></p>
                        @enderror
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-2 md:p-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="static-modal" type="button" wire:click='save'
                        class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">I
                        accept</button>
                    <button data-modal-hide="static-modal" type="button"
                        class="px-4 py-2 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>
    {{-- <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah Seksi Baru
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="mb-6">
                        <label for="success" class="block mb-2 text-sm font-medium ">Nama Seksi</label>
                        <input type="text" id="success" name="nama_seksi" wire:model='nama_seksi'
                            class="border text-sm rounded-lg block w-full p-2.5 focus:ring-2 focus:outline-none focus:ring-yellow-300 "
                            placeholder="Masukkan Nama Seksi atau Kelompok, Contoh : Seksi Pengawasan VI">
                        @error($nama_seksi)
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="static-modal" type="button" wire:click='save'
                        class="text-white bg-yellow-500 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">I
                        accept</button>
                    <button data-modal-hide="static-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>
