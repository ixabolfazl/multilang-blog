<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h3>{{ __('About') }}</h3>
                    <div class="contact-info">
                        <p>{{ $setting[app()->getLocale()]->about }}</p>
                        <ul>
                            <li><i class="icofont-google-map"></i>{{ $setting[app()->getLocale()]->address }}</li>
                            <li><i class="icofont-phone"></i>{{ $setting[app()->getLocale()]->phone_number }}</li>
                            <li><i class="icofont-envelope"></i>
                                <span class="__cf_email__" data-cfemail="94fdfaf2fbd4e7fdfaf9e1fabaf7fbf9">{{ $setting[app()->getLocale()]->email }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <p>تمامی حقوق محفوظ است.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="go-top"><i class="icofont-swoosh-up"></i></div>
