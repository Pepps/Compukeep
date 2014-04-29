<!--Daniel Nilsson-->


<?php 
	
	//Om email-addressen eller lösenordet inte stämmer så får man felmedelande och får försöka igen
if($error==0){
	echo"<h3>Email-addressen eller lösenordet stämmer inte.</br>Försök igen.</h3>";
} 
		
		

echo "<h3>Välkommen att registrera dig!</h3>
      <!--Registrerings formulär-->
	  <form method='post' action='Registration/registrationsent'>
	  <br /> <input type='text' id='reg' name='email' placeholder='Email' required><br />
	  <br /> <input type='text' id='reg' name='confirm_email' placeholder='Upprepa email' required><br />
	  <br /> <input type='password' id='reg' name='password' placeholder='Lösenord' required><br />
	  <br /><input type='password' id='reg' name='confirm_password' placeholder='Upprepa lösenord' required><br /><br />
	  <input type='submit' id='submit' method='post' name='reg' value='Registrera'>
	  </form>";
?>