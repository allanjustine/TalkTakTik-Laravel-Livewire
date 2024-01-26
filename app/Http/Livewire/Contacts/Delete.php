<?php

namespace App\Http\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contact;
use App\Events\UserLog;
class Delete extends Component
{

    public $contactId;
    public function getContactProperty() {
        return Contact::select('id', 'name', 'contact_number', 'sim_card')
            ->find($this->contactId);
    }

    public function delete() {
        $this->contact->delete();

        $log_entry = 'Deleted an contact "' . $this->contact->name . '" with the ID# of ' . $this->contact->id;
        event(new UserLog($log_entry));

        return redirect('/contact')->with('message', $this->contact->name . ' has been deleted successfully');
    }

    public function back() {
        return redirect('/contact');
    }
    public function render()
    {
        return view('livewire.contacts.delete');
    }
}
