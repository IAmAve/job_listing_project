<x-layout>

    @include('template._hero')

    @include('template._search')

    @unless(count($listings) == 0)

    @foreach($listings as $listing)
            <x-listing-card :listing="$listing"/>      
    @endforeach

    @else
        <p>No Job Available</p>
    @endunless

</x-layout>

{{-- You can add PHP personally in here by using this
@php
    $test=1;
@endphp;

{{$test}} --}}

{{-- @if(count($listings)==0)
    <p>No Job Available</p>
@endif --}}