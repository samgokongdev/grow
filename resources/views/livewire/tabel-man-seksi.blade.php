<?php

use Livewire\Volt\Component;
use App\Models\Seksi;

new class extends Component {
    #[\Livewire\Attributes\On('seksiCreated')]
    public function updateSeksi()
    {
    }

    public function with()
    {
        return [
            'seksis' => Seksi::paginate(10),
        ];
    }
}; ?>

<div>
    <livewire:manajemenseksi.tambah-seksi />
    <div class="overflow-x-auto rounded-lg border border-gray-200 max-w-2xl mx-auto">
        <div>
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Daftar Seksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @if (count($seksis) === 0)
                        <tr>
                            <td class="whitespace-nowrap px-4 py-2 text-gray-400 flex justify-center ">
                                <span>Tidak Ada Data Yang Dapat Ditampilkan</span>
                            </td>
                        </tr>
                    @else
                        @foreach ($seksis as $s)
                            <tr wire:key='{{ $s->id }}'>
                                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 flex justify-between">
                                    <span>{{ $s->nama_seksi }}</span>
                                    <span class="flex items-center justify-center space-x-1 ">

                                        <svg class="w-4 h-4 text-gray-500" data-slot="icon" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path
                                                d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z">
                                            </path>
                                            <path
                                                d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z">
                                            </path>
                                        </svg>
                                        <svg data-slot="icon" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                            class="w-4 h-4 text-red-700">
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z">
                                            </path>
                                        </svg>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
