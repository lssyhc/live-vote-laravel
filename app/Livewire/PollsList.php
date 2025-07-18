<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Component;

class PollsList extends Component
{
    public $polls;

    public function mount()
    {
        $this->polls = Poll::with('options')->latest()->get();
    }

    public function votes($optionId)
    {
        $option = Option::findOrFail($optionId);
        $pollId = $option->poll_id;

        if (request()->has('voted_' . $pollId)) {
            return;
        }

        $option->increment('votes');
        session()->put('voted_' . $pollId);
        $this->polls = Poll::with('options')->latest()->get();
    }

    public function render()
    {
        return view('livewire.polls-list');
    }
}
