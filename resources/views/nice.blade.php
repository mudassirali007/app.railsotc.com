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
<div class="logoContainerOther"><img src="assets/prog_rails.png" class="logo" style="width:3rem"></div>
<div class="outline">
<h2>Great…✌</h2>
<div>Order is Successfully Placed<script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;76d804656db09e28&quot;,&quot;version&quot;:&quot;2022.11.0&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;6e276d29129a46e7baec146019c09ef9&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
</div>
<img class="validator" src="assets/checked-success-svgrepo-com.svg" alt="OOPS">
<button value="Submit" class="submitBtn">Go Back</button>
</div>
<script>
      let submitBtn = document.querySelector('.submitBtn')
      submitBtn.addEventListener('click',() => {
         window.location.href = "/orders?didt={{$didt}}"
      })
   </script>
<style>
      .validator {
         height: 150px;
         padding: 30px;
      }
   </style>

</body>
</html>
