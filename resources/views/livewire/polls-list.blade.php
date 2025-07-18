<div>
    <div class="space-y-6">
        @foreach ($this->polls as $poll)
            @php
                $totalVotes = $poll->options->sum('votes');
            @endphp
            <div class="rounded-lg bg-white p-6 shadow-md" wire:key="poll-{{ $poll->id }}">
                <h3 class="mb-3 text-xl font-semibold">{{ $poll->title }}</h3>

                @foreach ($poll->options as $option)
                    @php
                        $votePercentage = $totalVotes > 0 ? number_format(($option->votes / $totalVotes) * 100, 1) : 0;
                        $hasVoted = session()->has('voted_' . $poll->id);
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
                                    class="{{ $hasVoted ? 'bg-gray-100 text-gray-500' : 'bg-indigo-100 text-indigo-700 hover:bg-indigo-200' }} inline-flex cursor-pointer items-center rounded-md border border-indigo-500 px-3 py-1 text-sm font-medium transition"
                                    title="{{ $hasVoted ? 'Anda sudah memberikan suara' : 'Klik untuk vote' }}"
                                    wire:click="vote({{ $option->id }})"
                                    @if ($hasVoted) disabled @endif>
                                    <span wire:loading.remove wire:target="vote({{ $option->id }})">
                                        {{ $hasVoted ? 'Voted' : 'Vote' }}
                                    </span>
                                    <span wire:loading wire:target="vote({{ $option->id }})">
                                        <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        Voting...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4 flex flex-wrap justify-between">
                    <p class="text-sm text-gray-500">Total Suara: {{ $totalVotes }}</p>
                    @if (session()->has('voted_' . $poll->id))
                        <p class="text-sm text-green-600">Anda sudah memberikan suara pada polling ini</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
