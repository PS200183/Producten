
<section class="overflow-hidden bg-white py-11 font-poppins ">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4 md:w-1/2 ">
                <div class="sticky top-0 z-50 overflow-hidden ">
                    <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
                        <img src=" {{ $product->image }}" alt=" {{ $product->naam }}"
                            class="object-cover w-full lg:h-full ">
                    </div>

                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 ">
                <div class="lg:pl-20">
                    <div class="mb-8 ">
                        <h2 class="max-w-xl mt-2 mb-6 text-2xl font-bold dark:text-gray-400 md:text-4xl">
                            {{ $product->naam }}   </h2>

                        <p class="max-w-md mb-8 text-gray-700 dark:text-gray-400">
                            {{ $product->omschrijving }}
                        </p>
                        <p class="inline-block mb-8 text-4xl font-bold text-gray-700 dark:text-gray-400 ">
                            <span> &euro; {{ $product->prijs }}</span>
                        </p>

                    </div>

                    <div class="w-32 mb-8 ">
                        <label for=""
                            class="w-full text-xl font-semibold text-gray-700 dark:text-gray-400">Aantal</label>
                        <div class="relative flex flex-row w-full h-10 mt-4 bg-transparent rounded-lg">

                            <input type="number"
                                class="flex items-center w-full font-semibold text-center bg-gray-300 outline-none teplaceholder-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                                placeholder="1"
                                min="1" max="100" wire:model="quantity">


                        </div>
                    </div>
                    <div class="flex flex-wrap items-center -mx-4 ">
                        <div class="w-full px-4 mb-4 lg:w-1/2 lg:mb-0">
                            <button
                                class="w-full px-6 py-3 text-lg font-semibold text-white transition duration-150 ease-in-out bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:bg-gray-700"
                                wire:click="addToCart({{ $product }})">Toevoegen aan winkelwagen
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
