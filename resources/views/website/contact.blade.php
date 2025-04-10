@php
    $pageTitle = 'Contact';
    $activePage = 'contact';
@endphp

@extends('website.layout.main')

@section('main-body')
<section class="contact section" id="contact" style="margin-bottom: 50px">
    <h2 class="section_title">Contact <span>Me</span></h2>

    <div class="contact_container container">
        <form action="{{ route('contact.send') }}" method="POST" class="contact_content">
            @csrf
            <div class="inputs">
                <input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required />
                <input type="text" name="subject" placeholder="Subject" value="{{ old('subject') }}" required />
            </div>
            <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required />
            <textarea name="message" rows="10" placeholder="Message" required>{{ old('message') }}</textarea>
            <button type="submit" class="btn">
                Send Message
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>
    </div>
</section>

@if(session('success'))
    <div id="success-alert" class="alert alert-success floating-alert">
        {{ session('success') }}
        <span class="close-alert" onclick="closeAlert('success-alert')">&times;</span>
    </div>
@endif

@if($errors->any())
    <div id="error-alert" class="alert alert-danger floating-alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <span class="close-alert" onclick="closeAlert('error-alert')">&times;</span>
    </div>
@endif

<script>
function closeAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
        alert.classList.add('hide');
        setTimeout(() => {
            alert.remove();
        }, 300);
    }
}

// Auto hide alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.floating-alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert) {
                alert.classList.add('hide');
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.remove();
                    }
                }, 300);
            }
        }, 5000);
    });
});
</script>
@endsection