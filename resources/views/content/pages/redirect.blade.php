@extends('layouts.app')
@php
    $isNavbar = false;
    $isSidebar = false;
    $isFooter = false;
@endphp

@section('title', __('Redirect'))

@section('content')

<p>I Will Redirect You</p>

<script>
    if (navigator.userAgent.indexOf("Android")) { // if android system
        window.location.href = "https://play.google.com/store/apps/details?id=org.telegram.messenger";
    } else if(navigator.userAgent.indexOf("iPhone")) { // if ios system 
        window.location.href = "https://apps.apple.com/dz/app/djezzy/id1262903573";
    } else {
        window.location.href = "{{ url('/') }}";
    }
</script>
@endsection