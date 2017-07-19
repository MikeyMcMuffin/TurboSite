<?php
require_once '../init/init.php';

var_dump(Token::check(Input::get('token')));

if(Input::exists()){
	if(Token::check(Input::get('token'))){ //checks that there is a token on the form and it is correct (eg submit button is actually pressed);

		$validate = new Validate();
		$validation= $validate->check($_POST, array(
			'username' => array(
				'required' => true,
				'min' => 4,
				'max' => 20,
				'unique' => 'users'
			),
			'password' => array(
				'required' => true,
				'min' => 6
			),
			'password_confirm' => array(
				'required' => true,
				'matches' => 'password'
			),
			'name' => array(
				'required' => false,
				'min' => 2,
				'max' => 50
			)

			));

		if($validation->passed()){
			Session::flash('success', 'You have registered successfully!');
		} else {
			foreach($validation->errors() as $error){
				echo $error, '<br>';
			}
		}
	}
}
?>

<form action="" method="post">
	<div class="field">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off">
	</div>

	<div class="field">
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
	</div>

	<div class="field">
		<label for="password_confirm">Confim Password:</label>
		<input type="password" name="password_confirm" id="password_confirm">
	</div>

	<div class="field">
		<label for="name">Name:</label>
		<input type="type" name="name" value="<?php echo escape(Input::get('name')); ?>" id="name">
	</div>

	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" value="Register">
</form>