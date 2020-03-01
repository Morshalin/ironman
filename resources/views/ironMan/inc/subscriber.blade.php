<div class="rs-subscribe white-bg shadow-style">
    <form class="subscribe-form" action="{{route('subscribe')}}" id="subscribe" method="POST">
        @csrf
        <div class="row rs-vertical-middle">
            <div class="col-lg-6 col-md-12 md-mb-30">
                <div class="title-part">
                    <h2 class="title"> Subscribe Our Newsletter</h2>
                    <p class="desc margin-0"> Subscribe to our newsletter for getting regular updates.</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="subscribe-form-fields">
                    <input type="submit" class="news-submit solid" value="Subscribe">
                    <input type="email" class="news-email gray-bg" name="email" id="email" placeholder="EMAIL ADDRESS"
                        required="">
                </div>
            </div>
        </div>
    </form>
</div>