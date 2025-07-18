<div>
    <form wire:submit.prevent="save">
        <div class="rounded-lg bg-white p-6 shadow-md">
            <h2 class="mb-4 text-2xl font-semibold">Buat Poll Baru</h2>

            {{-- Notifikasi Sukses --}}
            <div class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700"
                role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">Pesan sukses akan muncul di sini.</span>
            </div>

            {{-- Input Judul Poll --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="title">Judul Poll</label>
                <input
                    class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    id="title" type="text" wire:model.live="title" placeholder="Apa topik polling Anda?">
                <div class="mt-1 text-sm text-red-500">Pesan error untuk judul akan muncul di sini.</div>
            </div>

            {{-- Daftar Opsi Dinamis --}}
            <div class="mb-4">
                <label class="mb-2 block text-sm font-medium text-gray-700">Opsi Poll</label>

                {{-- Opsi 1 (Contoh Statis) --}}
                <div class="mb-2 flex items-center space-x-2">
                    <input
                        class="block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        type="text" wire:model.live="options.0" placeholder="Opsi 1">
                    <button
                        class="inline-flex cursor-pointer items-center rounded border border-transparent bg-red-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                        type="button">
                        Hapus
                    </button>
                </div>
                <div class="mt-1 pl-1 text-sm text-red-500">Pesan error untuk opsi 1 akan muncul di sini.</div>

                {{-- Opsi 2 (Contoh Statis) --}}
                <div class="mb-2 flex items-center space-x-2">
                    <input
                        class="block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                        type="text" wire:model.live="options.1" placeholder="Opsi 2">
                    <button
                        class="inline-flex cursor-pointer items-center rounded border border-transparent bg-red-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                        type="button">
                        Hapus
                    </button>
                </div>
                <div class="mt-1 pl-1 text-sm text-red-500">Pesan error untuk opsi 2 akan muncul di sini.</div>
            </div>

            {{-- Tombol Tambah Opsi --}}
            <button
                class="mb-4 inline-flex cursor-pointer items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50"
                type="button">
                Tambah Opsi
            </button>

            {{-- Tombol Submit --}}
            <div>
                <button
                    class="inline-flex w-full cursor-pointer items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    type="submit">
                    <span wire:loading.remove>Buat Poll</span>
                    <span wire:loading>Membuat...</span>
                </button>
            </div>
        </div>
    </form>
</div>
