<x-app-layout>
    <div>
        <div class="relative">
            <div class="multiple-items">
                @foreach ($backgrounds as $background)
                    <div class="w-full h-64 md:h-96 lg:h-128 xl:h-144">
                        <img src="{{ asset($background->URL) }}" alt=""
                            class="w-full h-full object-cover rounded-lg shadow-lg">
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            @foreach ($productTypesAll as $productType)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <h1 class="text-4xl font-bold text-teal-500 mb-4 text-center">{{ $productType->name }}</h1>
                    <div class="lg:px-28 md:px-20">
                        @foreach ($productType->kinds as $kind)
                            <h3 class="text-4xl font-medium text-teal-400 mb-4 mt-10">{{ $kind->name }}</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12">
                                @foreach ($kind->supplies as $valProduct)
                                    @if($valProduct->status == 2)
                                        @include('supplies.product_card')
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
