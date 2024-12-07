


<div class="grid grid-cols-2 gap-10 py-12 ">
    

    <div class="space-y-4" x-data = "{ image: '{{$this->product->image->path}}'}">
        <div class="bg-white p-5 rounded-lg shadow">
            <img x-bind:src="image" alt="">
        </div>
    
        <div class="grid grid-cols-4 gap-4">
            @foreach ($this->product->images as $image)
                <div class="rounded bg-white p-2 shadow">
                    <img src="{{$image->path}}" x-on:click = "image = '{{$image->path}}'" alt="" >
                </div>
            @endforeach
        </div>
    </div>
    <div>
       <h1 class="text-3xl font-medium"> {{ $this->product->name }} </h1>
       <div class="text-xl text-gray-700">
            {{$this->product->price}}
       </div>
       <div class="mt-4">
            {{$this->product->description}}
       </div>

       <div class="mt-4 space-y-4">
            <select wire:model="variant" name="" id="" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-800">
                @foreach ($this->product->Variants as $Variant)
                    <option value="{{$Variant->id}}">
                        {{$Variant->size}}/{{$Variant->color}}
                    </option>
                @endforeach
            </select>
       </div>

       @error('variant')
           <div class="mt-2 text-red-800">
                {{$message}}
           </div>
       @enderror

       <div class="mt-4 ">
            <x-button class="block w-full p-2" wire:click="addToCart">
                <span class="text-center">Add to cart</span>
            </x-button>
       </div>

       <div class="mt-3">
            @if($bannerMessage)
                <div class="banner border rounded-lg bg-green-500 p-2">
                    <span class="ms-1 text-white tracking-wide">{{ $bannerMessage }}</span>
                </div>
            @endif

       </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.7"></script>
