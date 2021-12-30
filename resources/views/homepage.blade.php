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
                    <form action="#" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                       data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validate"></div>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                   data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                            <div class="validate"></div>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required"
                                      data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="rounded-button">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
