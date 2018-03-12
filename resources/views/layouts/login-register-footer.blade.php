<div class="alt-login">
    <div id="line" class="line1"></div>
    <center style="font-size: 22px;">
        <b>or</b>
    </center>
    <div id="line" class="line2"></div>
    <br>
    <center>
        <a href="{{route('google.login')}}" class="btn btn-login">
            <i class="icon-google google"></i> Login With Google
        </a>
    </center>
    <center>
        <div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="false">
            <a class="btn btn-login" href="{{route('facebook.login') }}">
                <i class="icon-facebook fb"></i> Login With Facebook
            </a>
        </div>
    </center>
</div>