<?php
require_once '../init/init.php';

if(Input::exists()){
	echo 'Input exists';
	if(Token::check(Input::get('token'))){ //checks that there is a token on the form and it is correct (eg submit button is actually pressed);
		echo 'Token check works';
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
			echo 'Validation passed';
			$user = new User();
			
			$salt = Hash::salt(32);
			
			try {
				echo 'Trying create';
				$user->create(array(
					'username' => Input::get('username'),
					'password' => Hash::make(Input::get('password'), $salt),
					'salt' => $salt,
					'name' => Input::get('name'),
					'joined' => date('Y-m-d H:i:s'),
					'group' => 1
				));
				
				Session::flash('home', 'You have been registered and can now login');
				Redirect::to('index.php');
			} catch(Exception $e) {
				die($e->getMessage());
			}
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