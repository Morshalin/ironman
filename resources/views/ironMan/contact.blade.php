@extends('ironMan.layout.app')
@section('title')
<title> Iron Man | Contact Us </title>
@endsection

@section('main')
<!-- Breadcrumbs Section Start -->
<div class="rs-breadcrumbs">
    <div class="breadcrumbs-wrap">
        <img src="{{asset('frontend')}}/images/breadcrumbs/ironman.jpg" alt="Breadcrumbs Image">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="breadcrumbs-text">
                    <h1 class="breadcrumbs-title mb-17">Contact</h1>
                    <div class="categories">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li class="active">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs Section End -->

<!-- Contact Section Start -->
<div class="rs-contact">
  
    <!-- Contact Form And Map Start -->
    <div class="contact-part sec-bg pt-100 pb-100 md-pt-80 md-pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 md-mb-30">
                   <img src="{{asset('frontend/images/contact.jpg')}}" alt="Photo">
                </div>
                <div class="col-lg-6 pl-50 md-pl-15">
                    <div class="contact-area">
                        <div class="title-style mb-50">
                            <h2 class="margin-0 uppercase">Get in Touch</h2>
                            <span class="line-bg left-line pt-10 y-b"></span>
                        </div>
                        <div id="form-messages"></div>
                        <form id="myfrom" class="contact-form" method="POST" action="{{route('contactus')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="name" type="text" placeholder="Name" id="name" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="email" type="email" placeholder="E-Mail" id="email"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="number" type="text" placeholder="Phone Number" id="phone_number"
                                            required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="from-control">
                                        <input name="subject" type="text" placeholder="Subject" id="subject"
                                            required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="from-control">
                                <textarea name="message" placeholder="Your Message Here" id="message"
                                    required="required"></textarea>
                            </div>
                            <div class="submit-btn">
                                <button class="readon" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form And Map End -->

    <div class="sec-bg md-pb-80">
        <div class="container">

        </div>
    </div>
</div>
<!-- Contact Section End -->
@endsection
