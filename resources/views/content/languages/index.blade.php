@extends('layout.app')

@section('title', __('Form Basic Inputs'))

@section('content')
        repeater has  select for langauge and tow inputs one for english and one for selected


        cards every card has input of languages words
        @foreach($words as $word => $translations)
            {{ $word }}

            @foreach($languages as $lang)

                {{ $lang }}
                {{ $translations[$lang] ?? '' }} {{ __('Not available') }}
            @endforeach

        @endforeach

@endsection

