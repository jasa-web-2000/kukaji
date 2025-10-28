<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class FeaturedEventButton extends Component
{

    public Event $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function toggleFeatured()
    {
        sleep(2);
        $this->event->update([
            'featured' => !$this->event->featured,
        ]);
    }
    public function render()
    {
        return view('livewire.featured-event-button');
    }
}
