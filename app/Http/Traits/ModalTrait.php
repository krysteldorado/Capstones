<?php

namespace App\Http\Traits;

trait ModalTrait {
    public function hide_modal($modal_id)
    {
        $this->dispatchBrowserEvent('modal-toggle', ['id'=>$modal_id, 'action' => 'close']);
    }

    public function show_modal($modal_id)
    {
        $this->dispatchBrowserEvent('modal-toggle', ['id'=>$modal_id, 'action' => 'open']);
    }
}
