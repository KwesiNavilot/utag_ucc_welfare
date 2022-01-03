@extends('layouts.home')

@section('title', 'Welfare | UTAG UCC')

@section('content')
    <section id="forward" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to the UTAG-UCC Welfare Portal</h1>
            <h2>Here, you can request for your benefits</h2>
            <a href="{{ route('login') }}" class="m-lg-0 rounded-button">Request A Benefit</a>
        </div>
    </section>

    <section id="about" class="section">
        <div class="container">
            <div class="section-title">
                <h2>About</h2>
                <p>The Welfare Program</p>
            </div>

            <div class="row">
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                    <h3>The welfare program helps members live their best life.</h3>
                    <p class="font-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.
                        </li>
                        <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate
                            velit.
                        </li>
                        <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                            mastiro dolore eu fugiat nulla pariatur.
                        </li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate
                    </p>
                </div>

                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('/images/paper-family.webp') }}" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </section>

    <section id="claims" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Benefit</h2>
                <p>Types Of Benefits</p>
            </div>

            <div class="row icon-boxes">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="ri-stack-line"></i>
                        </div>

                        <h4 class="title text-center">
                            <span>Birth of Child</span>
                        </h4>

                        <p class="description">
                            Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="ri-palette-line"></i>
                        </div>

                        <h4 class="title text-center">
                            <span>Death of Spouse</span>
                        </h4>

                        <p class="description">
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="ri-command-line"></i>
                        </div>

                        <h4 class="title text-center">
                            <span>Death of Parent</span>
                        </h4>

                        <p class="description">
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                    <div class="icon-box">
                        <div class="icon">
                            <i class="ri-fingerprint-line"></i>
                        </div>

                        <h4 class="title text-center">
                            <span>Death of Member</span>
                        </h4>

                        <p class="description">
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Location</h4>
                        <p>Central Administration Building, UCC</p>
                    </div>

                    <div class="email mt-lg-4">
                        <i class="icofont-envelope"></i>
                        <h4>Email</h4>
                        <p>
                            <a href="mailto:support@welfare.utag-ucc.com">
                                support@welfare.utag-ucc.com
                            </a>
                        </p>
                    </div>

                    <div class="phone mt-lg-4">
                        <i class="icofont-phone"></i>
                        <h4>Call & WhatsApp</h4>
                        <p>
                            Tel: <a href="tel:+233541234567">+233 541 234 567</a><br>
                            Tel: <a href="tel:+233541234567">+233 541 234 567</a><br>
                            WhatsApp: <a href="https://wa.me/+233541234567">+233 541 234 567</a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">
                    @if(session('contacted'))
                        <div class="contact-form text-center">
                            <div class="content-header">
                                <h4>We are glad you reached out to us!</h4>
                            </div>

                            <div class="content-form">
                                <p>
                                    We'll peruse your message and get back to you as soon as possible.
                                    <br>
                                    Thank you &#128522;
                                </p>
                            </div>
                        </div>
                    @else
                        <form action="{{ route('contact') }}" method="post" role="form">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" placeholder="Enter your name..." required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           placeholder="Enter your email..." value="{{ old('email') }}" required>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       value="{{ old('subject') }}" placeholder="Subject" required>

                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5"
                                          placeholder="Enter your message..." style="margin-top: 0; margin-bottom: 0;"
                                          required></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="rounded-button">Send Message</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
