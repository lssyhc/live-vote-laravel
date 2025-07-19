<?php

namespace App\Livewire;

use App\Livewire\Forms\CreatePollForm;
use Livewire\Component;

class CreatePoll extends Component
{
    public CreatePollForm $form;

    public function addOption()
    {
        $this->form->options[] = '';
    }

    public function removeOption(int $index)
    {
        unset($this->form->options[$index]);
        $this->form->options = array_values($this->form->options);
        $this->validateOnly('options');
    }

    public function save()
    {
        $this->form->store();
        $this->form->reset(['title', 'options']);
        $this->dispatch('pollCreated');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-poll');
    }
}
