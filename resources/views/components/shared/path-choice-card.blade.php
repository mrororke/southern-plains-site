@props(['href', 'imagePath', 'title'])

<a href="{{ $href }}">
    <div class="relative text-white bg-cover bg-center pt-[203.78%]"
        style="background-image: url('{{ asset($imagePath) }}');">
        <div class="absolute inset-0 p-6 flex flex-col items-center justify-center text-center">
            <h4 class="font-heading font-bold text-5xl mt-8 mb-8">{{ $title }}</h4>
        </div>
    </div>
</a>