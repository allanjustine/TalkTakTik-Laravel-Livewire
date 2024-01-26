<?php

namespace App\Http\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contact;
use App\Events\UserLog;
class Create extends Component
{
    public $name, $email, $contact_number, $address, $sim_card;

    public function addContact() {
        $this->validate([
            'name'                      =>          ['required', 'string', 'max:255'],
            'email'                     =>          ['required', 'email', 'unique:contacts'],
            'contact_number'            =>          ['required', 'numeric', 'digits:11'],
            'address'                   =>          ['required', 'string', 'max:255'],
            'sim_card'                  =>          ['required', 'string', 'max:255']
        ]);

        $contact = Contact::create([
            'name'                  =>      $this->name,
            'email'                 =>      $this->email,
            'contact_number'        =>      $this->contact_number,
            'address'               =>      $this->address,
            'sim_card'              =>      $this->sim_card
        ]);

        $log_entry = 'Added an contact "' . $contact->name . '" with the ID# of ' . $contact->id;
        event(new UserLog($log_entry));
        sleep(3);
        $this->reset();
        return redirect('/contact')->with('message', $this->name . ' has been added successfully');
    }

    public function updated($propertyData) {
        $this->validateOnly($propertyData, [
            'email'                     =>      ['required', 'email', 'unique:contacts'],
            'contact_number'            =>      ['required', 'numeric', 'digits:11']
        ]);
    }


    public function render()
    {
        return view('livewire.contacts.create');
    }
}
