<div>
    <div class="space-y-6">
        @forelse ($this->polls as $poll)
            @php
                $totalVotes = $poll->options->sum('votes');
                $hasVoted = $this->hasVoted($poll->id);
            @endphp
            <div class="rounded-lg bg-white p-6 shadow-md" wire:key="poll-{{ $poll->id }}">
                <h3 class="mb-3 text-xl font-semibold">{{ $poll->title }}</h3>
                @foreach ($poll->options as $option)
                    @php
                        $votePercentage = $totalVotes > 0 ? number_format(($option->votes / $totalVotes) * 100, 1) : 0;
                    @endphp

                    <div class="space-y-3" wire:key="option-{{ $option->id }}">
                        <div class="mb-2 flex flex-col sm:flex-row sm:items-end sm:justify-between sm:gap-6">
                            <div class="w-full">
                                <div class="mb-1 flex items-center justify-between">
                                    <span class="font-medium">{{ $option->name }}</span>
                                    <span class="text-gray-600">
                                        {{ $option->votes }} Suara ({{ $votePercentage }}%)
                                    </span>
                                </div>
                                <div class="h-2.5 w-full rounded-full bg-gray-200" role="progressbar"
                                    aria-valuenow="{{ $votePercentage }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="h-2.5 rounded-full bg-indigo-600" style="width: {{ $votePercentage }}%">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 sm:mt-0">
                                <button
                                    class="{{ $hasVoted ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : 'bg-indigo-100 text-indigo-700 hover:bg-indigo-200' }} inline-flex w-20 cursor-pointer items-center justify-center rounded-md border border-indigo-500 px-3 py-1 text-sm font-medium transition"
                                    title="{{ $hasVoted ? 'Anda sudah memberikan suara' : 'Klik untuk vote' }}"
                                    wire:click="vote({{ $option->id }})" {{ $hasVoted ? 'disabled' : '' }}>
                                    <span wire:loading.remove wire:target="vote({{ $option->id }})">
                                        {{ $hasVoted ? 'Voted' : 'Vote' }}
                                    </span>
                                    <span wire:loading wire:target="vote({{ $option->id }})">
                                        Voting...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4 flex flex-wrap justify-between">
                    <p class="text-sm text-gray-500">Total Suara: {{ $totalVotes }}</p>
                    @if ($hasVoted)
                        <p class="text-sm text-green-600">Anda sudah memberikan suara pada polling ini</p>
                    @endif
                </div>
            </div>
        @empty
            <div class="rounded-lg bg-white p-6 text-center shadow-md">
                <p class="text-gray-500">Belum ada polling. Buat polling pertama Anda!</p>
            </div>
        @endforelse
    </div>
</div>
