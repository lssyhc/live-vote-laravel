<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePoll extends Component
{
    #[Validate(
        ['title' => 'required|min:3|max:255'],
        message: [
            'title.required' => 'Judul polling wajib diisi.',
            'title.min' => 'Panjang judul minimal 3 karakter.',
            'title.max' => 'Panjang judul maksimal 255 karakter.'
        ]
    )]
    public string $title = '';

    #[Validate(
        [
            'options' => 'required|array|min:1|max:10',
            'options.*' => 'required|min:1|max:255'
        ],
        message: [
            'options.required' => 'Setidaknya harus ada satu opsi.',
            'options.min' => 'Anda setidaknya harus memiliki 1 opsi.',
            'options.max' => 'Anda tidak bisa memiliki lebih dari 10 opsi.',
            'options.*.required' => 'Teks opsi tidak boleh kosong.',
            'options.*.min' => 'Panjang opsi minimal 1 karakter.',
            'options.*.max' => 'Panjang opsi maksimal 255 karakter.'
        ]
    )]
    public array $options = [''];

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption(int $index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function save()
    {
        $this->validate();

        Poll::create([
            'title' => $this->title,
        ])->options()
            ->createMany(
                collect($this->options)
                    ->map(fn($option) => ['name' => $option])
            );

        session()->flash('success', 'Poll berhasil dibuat!');
        $this->reset(['title', 'options']);
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
