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

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700" for="title">Judul Poll</label>
                <input
                    class="mt-1 block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    id="title" type="text" placeholder="Apa topik polling Anda?" wire:model.live="title">
                @error('title')
                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>

            @foreach ($options as $index => $option)
                <div class="mb-4">
                    <label class="mb-2 block text-sm font-medium text-gray-700">Opsi Poll {{ $index + 1 }}</label>

                    <div class="mb-2 flex items-center space-x-2" wire:key="options.{{ $index }}">
                        <input
                            class="block w-full rounded-md border-gray-300 p-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                            type="text" placeholder="Opsi {{ $index + 1 }}"
                            wire:model.live="options.{{ $index }}">
                        <button
                            class="inline-flex cursor-pointer items-center rounded border border-transparent bg-red-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                            type="button" wire:click="removeOption({{ $index }})">
                            Hapus
                        </button>
                    </div>
                    @error("options.$index")
                        <div class="mt-1 pl-1 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <button
                class="mb-4 inline-flex cursor-pointer items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50"
                type="button" wire:click="addOption">
                Tambah Opsi
            </button>

            <div>
                <button
                    class="inline-flex w-full cursor-pointer items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    type="submit" wire:click.prevent="save">
                    <span wire:loading.remove wire:target="save">Buat Poll</span>
                    <span wire:loading wire:target="save">Membuat...</span>
                </button>
            </div>
        </div>
    </form>
</div>
