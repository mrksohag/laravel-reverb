<?php

namespace App\Livewire;

use App\Events\PackageSent;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class DeliveryHistory extends Component
{
    public array $packageStatuses = [];

    public string $status = '';

    public function submitStatus()
    {
        PackageSent::dispatch('mizan', $this->status, Carbon::now());
        $this->reset('status');
    }

    #[On('echo:delivery,PackageSent')]
    public function onPackageSent($event)
    {
        array_unshift($this->packageStatuses, $event);
    }

    public function render()
    {
        return view('livewire.delivery-history');
    }
}
