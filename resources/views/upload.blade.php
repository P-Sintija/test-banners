@extends('layout')

@section('links')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@endsection

@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <script src="js/dropzone.js"></script>
@endsection

@section('content')
    <div class="container">
        <h2 class="text-blue-900 text-center text-6xl my-10">Upload your files!</h2>
        <form method="post" action="{{url('/temporaryStorage')}}" enctype="multipart/form-data"
              class="dropzone" id="dropzone">
            @csrf
        </form>
    </div>


    <div class=" flex justify-center">
        <form mrthod="GET" action="/upload">
            <button class=" px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
                    type="submit">Edit uploads
            </button>
        </form>
    </div>


    @if ($errors != null)
        @foreach ($errors->all() as $error)
            <div class="mx-20 font-bold text-red-800">
                {{ $error }}
            </div>
        @endforeach
    @endif


    <div class="grid grid-cols-4 ">
        @foreach($temporaryFiles as $file)

            <div class=" bg-gray-100 p-0 sm:p-12">
                <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">

                    <div class="flex justify-center">
                        <img class="text-center h-52"  src="/storage/temp/{{ $file->filename }}" >
                    </div>


                    <form method="POST" action="/upload">
                        @csrf
                        <div class="relative z-0 w-full my-5 flex justify-center">
                            <input class="mb-5 p-3 w-80 focus:border-blue-700 rounded border-2 outline-none"
                                   id="url" type="text" name="url" placeholder="Enter url">
                        </div>

                        <fieldset class="relative z-0 w-full p-px mb-5">

                            <div class="block pt-3 pb-2 space-x-4">
                                <label for="checkbox1">This window</label>
                                <input id="checkbox1" type="checkbox" name="checkbox[]" value="_self">

                                <label for="checkbox2">New window</label>
                                <input id="checkbox2" type="checkbox" name="checkbox[]" value="_blank">
                            </div>
                            <span class="text-sm text-red-600 hidden" id="error">Option has to be selected</span>
                        </fieldset>

                        <label for="position">Position</label>
                        <select name="position" id="position">
                            @foreach( $positions as $position)
                                <option>{{ $position }}</option>
                            @endforeach
                        </select>


                        <button class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
                                type="submit" name="id" value="{{ $file->id }}">Upload
                        </button>
                    </form>

                    <form method="post" action="/delete/{{ $file->id }}">
                        @csrf
                        <button class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-600 hover:shadow-lg focus:outline-none"
                                type="submit" name="id" value="{{ $file->id }}">Remove
                        </button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
@endsection
