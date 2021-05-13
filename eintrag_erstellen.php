<html>
<?php include('eintrag_form.php'); ?>
<link rel=stylesheet  href="/css/styles.css">
<div class="my_guestbook">  
	<form id="contact" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	  <h2>Schreibe etwas  ins Gästebuch</h2>
	  <fieldset>
		<input placeholder="Your name" type="text" name="name" value= "<?= $name ?>" tabindex="1" autofocus>
		<span class="error"><?= $name_error ?></span>
	  </fieldset>
	  <fieldset>
		<input placeholder="Your Email Address" type="text" name="email"  value= "<?= $email ?>" tabindex="2">
		<span class="error"><?= $email_error ?></span>
	  </fieldset>
	  <fieldset>
		<textarea placeholder="Gästebuch Eintrag" tabindex="5" name="message" value= "<?= $message?>"></textarea>
	  </fieldset>
	  <fieldset>
		<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
	  </fieldset>
	</form>	
	<p name="success" value=" <?=$success ?> "> </p>
  </div>
</html>
