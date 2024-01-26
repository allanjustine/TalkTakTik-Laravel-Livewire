<?php

namespace App\Http\Livewire\Contacts;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search, $sim_card = 'All';

    protected $paginationTheme = 'bootstrap';

    public function loadContacts() {
        $query = Contact::orderBy('id', 'asc')
            ->search($this->search);

            if ($this->sim_card != 'All') {
                $query->where('sim_card', $this->sim_card);
            }

            $contacts = $query->paginate(5);

        return compact('contacts');
    }

    public function render()
    {
        return view('livewire.contacts.index', $this->loadContacts());
    }
}
