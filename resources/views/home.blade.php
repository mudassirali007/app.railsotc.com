<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="icon" type="image/x-icon" href="assets/prog_rails.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/prog_rails.png">
        <link rel="apple-touch-startup-image" href="assets/prog_rails.png">
        <link rel="stylesheet" href="static/style.css">
        <meta name="apple-mobile-web-app-title" content="Rails App">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">
        <title>Rails App</title>
    </head>
    <body>
        <div class="indexContainer">
        <script src="https://auth.magic.link/pnp/login" data-magic-publishable-api-key="{{ env('MAGIC_PUBLISHABLE_API_KEY'), 'pk_xxxx_XXXXXXXXXXX' }}" data-terms-of-service-uri="https://app.railsotc.com/#terms" data-privacy-policy-uri="https://app.railsotc.com/#privacy" data-redirect-uri="/orders"></script>
        <div class="logoContainerIndex"><img src="assets/prog_rails.png" class="logo" style="width:3rem"/></div>
        <div class="spinnerContainer">
            <div id="sp1" class="spinner">
                <div></div><div></div><div></div><div></div><div></div><div></div>
            </div>
        </div>
        <script>
            setTimeout(async () => {
                let spinnerContainer = document.querySelector('.spinnerContainer')
                spinnerContainer.innerHTML = ""
            }, 1900)
        </script>
        </div>
        <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"76b59e902a1a0c38","version":"2022.11.0","r":1,"token":"6e276d29129a46e7baec146019c09ef9","si":100}' crossorigin="anonymous"></script>
    </body>
</html>
