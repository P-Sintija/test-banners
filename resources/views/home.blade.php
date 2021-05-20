@extends('layout')

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/countClicks.js"></script>
    <script src="js/slideShow.js"></script>
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center">
        <div class="w-3/4 p-4 my-2 flex justify-between">
            <img class="w-16 h-16 object-cover"
                 src="storage/images/logo.png" alt="logo"/>
            <div class="flex flex-row justify-center w-3/4">
                <button class="w-1/3 px-4 py-2 text-lg font-semibold tracking-wider text-black rounded hover:bg-blue-600 border-2">
                    One
                </button>
                <button class="w-1/3 px-4 py-2 text-lg font-semibold tracking-wider text-black rounded hover:bg-blue-600 border-2">
                    Two
                </button>
                <button class="w-1/3 px-4 py-2 text-lg font-semibold tracking-wider text-black rounded hover:bg-blue-600 border-2">
                    Three
                </button>
            </div>
        </div>


        <div class="w-3/4 h-auto my-2 flex justify-between"
             id="slideshow">
            @if (count($banners) > 0)
                @foreach($banners[1] as $banner)
                    <a class="object-contain w-full"
                       id="{{ $banner->id }}" href="{{ $banner->url }}" target="{{ $banner->redirect }}"
                       onclick="addClick(this)">
                        <img class="object-contain h-48 w-full"
                             src="storage/{{ $banner->file_path }}" alt="empty">
                    </a>
                @endforeach
            @else
                <img class="object-contain h-48 w-full"
                     src="storage/images/empty.jpg" alt="empty">
            @endif
        </div>


        <div class=" w-3/4 h-auto my-2 flex flex-row">
            <div class="w-3/4">
                <p class="text-xl m-2 text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In malesuada ultrices sem, ac faucibus
                    ligula
                    scelerisque ac. Nam molestie, mauris id commodo condimentum, velit neque suscipit lacus, quis
                    eleifend
                    sapien mi
                    quis nunc. Etiam venenatis tincidunt hendrerit. In aliquam justo ac neque accumsan mattis. Donec
                    eget
                    consequat
                    ipsum. Quisque sit amet ex urna. Integer in vestibulum lectus, id ornare augue. Aenean purus dolor,
                    iaculis
                    sollicitudin facilisis quis, dictum a nisi.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In malesuada ultrices sem, ac faucibus
                    ligula
                    scelerisque ac. Nam molestie, mauris id commodo condimentum, velit neque suscipit lacus, quis
                    eleifend
                    sapien mi
                    quis nunc. Etiam venenatis tincidunt hendrerit. In aliquam justo ac neque accumsan mattis. Donec
                    eget
                    consequat
                    ipsum. Quisque sit amet ex urna. Integer in vestibulum lectus, id ornare augue. Aenean purus dolor,
                    iaculis
                    sollicitudin facilisis quis, dictum a nisi.
                </p>
            </div>
            <div class="w-1/4 flex justify-end">
                @if(array_key_exists(2,$banners))
                    <a id="{{ $banners[2]->id }}" href="{{ $banners[2]->url }}" target="{{ $banners[2]->redirect }}"
                       onclick="addClick(this)">
                        <img class="object-contain "
                             src="storage/{{ $banners[2]->file_path }}" alt="empty">
                    </a>
                @else
                    <img src="storage/images/empty.jpg" alt="empty">
                @endif
            </div>
        </div>


        <div class="w-3/4 h-52 my-2 border-solid rounded-3xl border-2"></div>


        <div class="w-3/4 my-2 h-auto flex justify-between ">
            @if(array_key_exists(3,$banners))
                <a id="{{ $banners[3]->id }}" href="{{ $banners[3]->url }}" target="{{ $banners[3]->redirect }}"
                   onclick="addClick(this)">
                    <img src="storage/{{ $banners[3]->file_path }}" alt="empty">
                </a>
            @else
                <img class="w-52"
                     src="storage/images/empty.jpg" alt="empty">
            @endif

            @if(array_key_exists(4,$banners))
                <a id="{{ $banners[4]->id }}" href="{{ $banners[4]->url }}" target="{{ $banners[4]->redirect }}"
                   onclick="addClick(this)">
                    <img src="storage/{{ $banners[4]->file_path }}" alt="empty">
                </a>
            @else
                <img class="w-52"
                     src="storage/images/empty.jpg" alt="empty">
            @endif

            @if(array_key_exists(5,$banners))
                <a id="{{ $banners[5]->id }}" href="{{ $banners[5]->url }}" target="{{ $banners[5]->redirect }}"
                   onclick="addClick(this)">
                    <img src="storage/{{ $banners[5]->file_path }}" alt="empty">
                </a>
            @else
                <img class="w-52"
                     src="storage/images/empty.jpg" alt="empty">
            @endif
        </div>
    </div>
@endsection
