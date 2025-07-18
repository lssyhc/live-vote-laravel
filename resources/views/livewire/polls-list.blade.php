<div>
    {{-- Ini adalah kontainer untuk daftar poll --}}
    <div class="space-y-6">

        {{-- Contoh Poll Card 1 (Statis) --}}
        <div class="rounded-lg bg-white p-6 shadow-md">
            <h3 class="mb-3 text-xl font-semibold">Judul Poll Akan Tampil di Sini</h3>
            <div class="space-y-2">

                {{-- Contoh Opsi 1 --}}
                <div class="flex items-center justify-between rounded-md p-2 hover:bg-gray-50">
                    <span>Nama Opsi 1</span>
                    <button
                        class="inline-flex cursor-pointer items-center rounded-md border border-indigo-500 bg-indigo-100 px-3 py-1 text-sm font-medium text-indigo-700 hover:bg-indigo-200">
                        <span wire:loading.remove wire:target="vote(1)">Vote</span>
                        <span wire:loading wire:target="vote(1)">Voting...</span>
                    </button>
                </div>

                {{-- Contoh Opsi 2 --}}
                <div class="flex items-center justify-between rounded-md p-2 hover:bg-gray-50">
                    <span>Nama Opsi 2</span>
                    <button
                        class="inline-flex cursor-pointer items-center rounded-md border border-indigo-500 bg-indigo-100 px-3 py-1 text-sm font-medium text-indigo-700 hover:bg-indigo-200">
                        Vote
                    </button>
                </div>

                {{-- Contoh Opsi 3 --}}
                <div class="flex items-center justify-between rounded-md p-2 hover:bg-gray-50">
                    <span>Nama Opsi 3</span>
                    <button
                        class="inline-flex cursor-pointer items-center rounded-md border border-indigo-500 bg-indigo-100 px-3 py-1 text-sm font-medium text-indigo-700 hover:bg-indigo-200">
                        Vote
                    </button>
                </div>
            </div>
            <p class="mt-4 text-sm text-gray-500">Total Suara: XX</p>
        </div>

        {{-- Contoh Poll Card 2 (Statis) - Menunjukkan tampilan setelah vote --}}
        <div class="rounded-lg bg-white p-6 shadow-md">
            <h3 class="mb-3 text-xl font-semibold">Judul Poll Lainnya Akan Tampil di Sini</h3>
            <div class="space-y-3">

                {{-- Contoh Opsi 1 dengan progress bar --}}
                <div>
                    <div class="mb-1 flex items-center justify-between">
                        <span class="font-medium">Opsi A</span>
                        <span class="text-gray-600">XX Suara (YY%)</span>
                    </div>
                    <div class="h-2.5 w-full rounded-full bg-gray-200">
                        <div class="h-2.5 rounded-full bg-indigo-600" style="width: 45%"></div>
                    </div>
                </div>

                {{-- Contoh Opsi 2 dengan progress bar --}}
                <div>
                    <div class="mb-1 flex items-center justify-between">
                        <span class="font-medium">Opsi B</span>
                        <span class="text-gray-600">XX Suara (YY%)</span>
                    </div>
                    <div class="h-2.5 w-full rounded-full bg-gray-200">
                        <div class="h-2.5 rounded-full bg-indigo-600" style="width: 55%"></div>
                    </div>
                </div>

            </div>
            <p class="mt-4 text-sm text-gray-500">Total Suara: XX</p>
        </div>

    </div>
</div>
