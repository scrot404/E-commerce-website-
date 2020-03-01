<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>
     	<script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <form action="?" method="POST">
      <div class="g-recaptcha" data-sitekey="6LcdKJ8UAAAAAP0RSdFD9uwa0BMFfL9fJ5HMyRY7"  data-callback="capcha_filled" data-expired-callback="capcha_expired"></div>
      <br/>
      <input type="submit" value="Submit">
    </form>
  </body>
</html>