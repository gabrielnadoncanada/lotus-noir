<?php

namespace App\Http\Livewire\Forms;

use App\Models\FormEntry;
use Livewire\Component;

class Contact extends Component
{
    public $firstName;

    public $lastName;

    public $email;

    public $tel;

    public $message;

    public $success = null;

    public function rules()
    {
        return [
            'firstName' => 'required|regex:/^[a-zA-Z\s.]+$/',
            'lastName' => 'required|regex:/^[a-zA-Z\s.]+$/',
            'email' => 'required|email',
            'tel' => 'nullable',
            'message' => 'required|regex:/^[a-zA-Z0-9\s.:,!?\']+$/',
        ];
    }

    public function submit()
    {

        $validatedData = $this->validate();

        $message = FormEntry::create($validatedData);

        // empty the form and return a success message
        $this->reset();
        $this->success = true;

    }

    public function render()
    {
        return view('livewire.forms.contact');
    }
}
