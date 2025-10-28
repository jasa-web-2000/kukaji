<?php

namespace App\Livewire;

use App\Models\Speaker;
use App\Models\Theme;
use Livewire\Component;

class SearchSelect extends Component
{

    public $search;
    public $selectedId;
    public $selectedName;
    public $table;
    public $label;
    public $name;
    public $required;



    public function render()
    {
        if ($this->search == null || $this->search == '') {
            $this->search = $this->selectedName ?? old($this->name . '-front') ?? '';
        }

        switch ($this->table) {
            case 'regency':
                $data = regency()
                    ->filter(fn($item) => stripos($item['name'], $this->search) !== false);
                break;

            case 'theme':
                $data = Theme::where('name', 'LIKE', "%$this->search%")->get();
                break;

            case 'speaker':
                $data = Speaker::where('name', 'LIKE', "%$this->search%")->get();
                break;

            default:
                $data = collect([null]);
                break;
        }


        return view('livewire.search-select', [
            'data' => $data->sortBy(fn($item) => $item['name'])->take(5),
        ]);
    }
}
