<?php

namespace App\Livewire\Forms;

use App\Models\Poll;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreatePollForm extends Form
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

    public function store()
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
    }
}
