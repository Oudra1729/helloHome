@extends('layouts.app')

@section('content')
    @include('sections.section-1')
    @include('sections.section-3')
    @include('sections.section-2')
    @include('sections.section-4')
    @include('sections.section-5')

    <script>
    // Example implementation of isUserRegistered function
function isUserRegistered() {
    // You need to implement your logic here to check if the user is registered
    // For demonstration purposes, let's assume a simple scenario where the user is registered if a certain cookie is set
    return document.cookie.includes("user_registered=true");
}

document.addEventListener("DOMContentLoaded", function() {
    // Check if the user is already registered
    var userRegistered = isUserRegistered();

    // Set a timer to show the alert after 30 seconds if the user is not registered
    setTimeout(function() {
        if (!userRegistered) {
            alert("Please register for an account!");
            // You can redirect the user to the registration page here if needed
            // window.location.href = "/register";
        }
    }, 30000); // 30 seconds
});

    </script>
@endsection

