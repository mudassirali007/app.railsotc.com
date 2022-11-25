<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     @include('layouts.header')
    <body>
<div class="logoContainerOther">
   @include('layouts.logo')
</div>
<div class="outline">
<h2>CONGRATULATIONS 🎉</h2>
<div>Your purchase was successful!<script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon="{&quot;rayId&quot;:&quot;76f885e66a22c49d&quot;,&quot;version&quot;:&quot;2022.11.3&quot;,&quot;r&quot;:1,&quot;token&quot;:&quot;6e276d29129a46e7baec146019c09ef9&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>
</div>
<img class="validator" src="https://imagedelivery.net/lkj0eE8VZbZgsjUOvbSRnA/255c686e-b364-4faa-b446-0857cc92e700/public" alt="NICE">
<button class="submitBtn" value="Submit">Awesome</button>
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
