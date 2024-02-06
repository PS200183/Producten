<div>


    <div class="bg-white">
        <div class="max-w-2xl px-4 py-16 mx-auto sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">


          <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @foreach($products as $product)

            <a href="{{ route('products.show',$product) }}" class="group" wire:key='{{ $product->id }}'>
              <div class="w-full overflow-hidden bg-gray-200 rounded-lg aspect-h-1 aspect-w-1 xl:aspect-h-8 xl:aspect-w-7">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="object-cover object-center w-full h-full group-hover:opacity-75">
              </div>
              <h3 class="mt-4 text-sm text-gray-700">{{ $product->naam }}</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">&euro; {{ $product->prijs }}</p>
            </a>

@endforeach
            {{ $products->links() }}  
          </div>
        </div>
      </div>




    {{-- <div class="grid grid-cols-2 gap-1 p-2 bg-gray-100">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="mb-4 card">
                    <div class="card-body">
                        <h5 class="card-title text-align">{{ $product->naam }}</h5>
                        <p class="card-text" style="background: grey">{{ $product->omschrijving }}</p>
                        <div class="card-img">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="object-cover w-full h-32 mb-2">

                        <p class="card-text">€ {{ $product->prijs }}</p>

                        <button wire:click="addToCart({{ $product }})" class="bg-green-400 btn btn-primary">Toevoegen aan winkelwagen</button>
                    </div>
                </div>
            </div>


        @endforeach





        {{ $products->links() }}  --}}
    </div>

