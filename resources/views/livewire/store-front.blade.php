<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 justify-center mt-5"> 
    @foreach ($this->products as $product)
        <div class="bg-white rounded-lg shadow-md relative"> 

            <a href="{{route('product', $product )}}" class="absolute inset-0 h-full w-full"></a>

            <img src="{{$product->image->path}}" alt="" class="object-contain w-full h-48 rounded-t-lg mt-3"> 
 
            <div class="p-4">
                <h2 class="font-medium text-lg mb-2">{{$product->name}}</h2>
                <span class="text-gray-700 text-sm">{{$product->price}}</span>
            </div>
        </div>
    @endforeach
 </div>
 