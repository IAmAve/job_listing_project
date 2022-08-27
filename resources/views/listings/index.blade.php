<x-layout>

    @include('template._hero')

    @include('template._search')

    <div class="lg:grid lg:grid-cold-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless(count($listings) == 0)

        @foreach($listings as $listing)
                <x-listing-card :listing="$listing"/>      
        @endforeach

        @else
            <p>No Job Available</p>
        @endunless
    </div>

    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>

</x-layout>

{{-- You can add PHP personally in here by using this
@php
    $test=1;
@endphp;

{{$test}} --}}

{{-- @if(count($listings)==0)
    <p>No Job Available</p>
@endif --}}