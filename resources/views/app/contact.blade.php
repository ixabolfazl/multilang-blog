@extends('app.layouts.app')
@section('content')
    <section class="contact-area pb-40">
        <div class="container">
            <ul class="breadcrumb">
                @include('app.layouts.breadcrumb')
            </ul>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="contact-form">
                        <h3>تماس با ما</h3>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="نام شما *" required data-error="نام خود را وارد کنید">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="ایمیل شما *" required data-error="ایمیل خود را وارد کنید">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="msg_subject" id="msg_subject" required data-error="موضوع خود را بنویسید" placeholder="موضوع*">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                    <textarea placeholder="پیام شما *" name="message" id="message" class="form-control" cols="30" rows="10" required data-error="پیام خود را بنویسید"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">ارسال پیام</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="contact-info">
                        <h3>تماس بگیرید</h3>
                        <p>لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است. لورم ایپسوم به سادگی ساختار چاپ و متن را در بر می گیرد. لورم ایپسوم به مدت 40 سال استاندارد صنعت بوده است.</p>
                        <ul>
                            <li><i class="icofont-google-map"></i> کشور شما ، استان و شهر شما ، محله سکونت</li>
                            <li><i class="icofont-phone"></i> <a href="index.htm#">021-12345678</a></li>
                            <li><i class="icofont-envelope"></i>
                                <a href="index.htm#"><span class="__cf_email__" data-cfemail="48292c252126083b2126253d26662b2725">[email&#160;protected]</span></a>
                            </li>
                            <li><i class="icofont-ui-browser"></i> <a href="index.htm#">www.sinmun.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
