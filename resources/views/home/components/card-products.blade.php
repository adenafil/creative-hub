@php use App\Helper\ImageHelper; @endphp
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-[22px]">
        {{--        {{dd(ImageHelper::isThisImage($dataHome['newProducts'][0]['image_product_url']))}}--}}

        @foreach($products as $product)
            <div class="product-card flex flex-col rounded-[18px] bg-[#181818] overflow-hidden">
                <a href="{{ route("home.product.detail", [$product->id]) }}"
                   class="thumbnail w-full h-[180px] flex shrink-0 overflow-hidden relative">
                    <img src="{{
                                    ImageHelper::isThisImage($product->image_product_url)
                                    ? $product->image_product_url
                                    : URL::signedRoute('file.view', ['encoded' => ImageHelper::encodePath($product->image_product_url)])
                                     }}
    " class="w-full h-full object-cover" alt="thumbnail">
                    <p class="backdrop-blur bg-black/30 rounded-[4px] p-[4px_8px] absolute top-3 right-[14px] z-7">
                        Rp {{number_format($product->price, 0, ',', '.')}}</p>
                </a>
                <div class="p-[10px_14px_12px] h-full flex flex-col justify-between gap-[14px]">
                    <div class="flex flex-col gap-1">
                        <a href={{ route("home.product.detail", [$product->id]) }} class=" font-semibold text-xs
                           md:text-lg lg:text-lg line-clamp-2 hover:line-clamp-none">{{$product['title']}}</a>
                        <p
                            class="bg-[#2A2A2A] text-[10px] md:text-xs lg:text-xs text-creativehub-grey rounded-[4px] p-[4px_6px] w-fit">{{strtoupper($product->category->name)}}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">

                        <div class="w-6 h-6 flex shrink-0 items-center justify-center rounded-full overflow-hidden">
                            <img src="
                                @if(isset($product->user->user_detail->image_url))
                                    {{
                                        ImageHelper::isThisImage($product->user->user_detail->image_url)
                                        ? $product->user->user_detail->image_url
                                        : URL::signedRoute('profile.file', ['encoded' => ImageHelper::encodePath($product->user->user_detail->image_url)])
                                    }}
                                @else
                                    {{\Illuminate\Support\Facades\URL::to('/assets/photos/img.png')}}
                                @endif
"
                                 class="w-full h-full object-cover" alt="logo">
                        </div>
                        <a href="" class="font-semibold text-xs text-creativehub-grey">{{$product->user->name}}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
