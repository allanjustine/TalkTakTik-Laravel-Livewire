<?php

namespace App\Http\Livewire\Contacts;
use App\Models\Contact;
use Livewire\Component;
use App\Events\UserLog;

class Edit extends Component
{

    public $contactId;
    public $name, $contact_number, $email, $address, $sim_card;
    public function mount() {
        $this->name = $this->contact->name;
        $this->contact_number = $this->contact->contact_number;
        $this->email = $this->contact->email;
        $this->address = $this->contact->address;
        $this->sim_card = $this->contact->sim_card;

    }

    public function editContact() {
        $this->validate([
            'name'                      =>          ['required', 'string', 'max:255'],
            'email'                     =>          ['required', 'email', 'unique:contacts,email,'.$this->contact->id],
            'contact_number'            =>          ['required', 'numeric', 'digits:11'],
            'address'                   =>          ['required', 'string', 'max:255'],
            'sim_card'                  =>          ['required', 'string', 'max:255']
        ]);

        $this->contact->update([
            'name'                      =>      $this->name,
            'email'                     =>      $this->email,
            'contact_number'            =>      $this->contact_number,
            'address'                   =>      $this->address,
            'sim_card'                  =>      $this->sim_card
        ]);

        $log_entry = 'Updated an contact "' . $this->name . '" with the ID# of ' . $this->contact->id;
        event(new UserLog($log_entry));

        return redirect('/contact')->with('message', $this->name . ' has been updated successfully');
    }

    public function updated($propertyData) {
        $this->validateOnly($propertyData, [
            'email'                     =>          ['required', 'email', 'unique:contacts'],
            'contact_number'            =>          ['required', 'numeric', 'digits:11']
        ]);
    }

    public function back() {
        return redirect('/contact');
    }
    public function getContactProperty() {
        return Contact::find($this->contactId);
    }

    public function render()
    {
        return view('livewire.contacts.edit');
    }
}
