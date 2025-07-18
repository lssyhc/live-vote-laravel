<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class PollsList extends Component
{
    public Collection $polls;
    public array $votedPolls = [];

    public function mount()
    {
        $this->polls = Poll::with('options')->latest()->get();
        $this->loadVotedStatus();
    }

    protected function loadVotedStatus()
    {
        if (session()->has('votedPolls')) {
            $this->votedPolls = session('votedPolls');
        }
    }

    public function hasVoted($pollId)
    {
        return isset($this->votedPolls[$pollId]) && $this->votedPolls[$pollId] === true;
    }

    public function vote($optionId)
    {
        $option = Option::findOrFail($optionId);
        $pollId = $option->poll_id;

        if ($this->hasVoted($pollId)) {
            return;
        }

        $option->increment('votes');
        $this->votedPolls[$pollId] = true;

        session()->put('votedPolls', $this->votedPolls);
        $this->polls = Poll::with('options')->latest()->get();
    }

    public function render()
    {
        return view('livewire.polls-list');
    }
}
