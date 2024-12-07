<div class="bg-white rounded shadow mt-12 max-width-xl p-5 mx-auto">
    @if($this->order) 
        <p>
            Thanks for your order {{$this->order->id}}
        </p>
        @else
        <p wire:poll>
            Waiting for payment confirmation!please standby...
        </p>
    @endif
</div>
