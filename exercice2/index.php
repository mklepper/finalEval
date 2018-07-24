<?php

require_once 'connect.php'; // the page called by require once was wrong.

$order = '';
$errors = ''; // the errors variable was not declared.

if(isset($_GET['order']) && isset($_GET['column'])){   // a closing parentheses ) was missing.

	if($_GET['column'] == 'lastname') // column was misspelled.
	{
		$order = ' ORDER BY lastname';
	}
	elseif($_GET['colum'] = 'firstname')
	{
		$order = ' ORDER BY firstname';
	}
	elseif($_GET['colum'] == 'birthdate')
	{
		$order = ' ORDER BY birthdate';
	}
	
	if($_GET['order'] == 'asc') // order was misspelled.
	{
		$order.= ' ASC';
	}
	elseif($_GET['order'] == 'desc') 
	{
		$order.= ' DESC';
	}
}

//---------------------In the part below were a few curly brackets missing and very bad code indentation------------
if(!empty($_POST))
{
	foreach($_POST as $key => $value)
	{
		$post[$key] = strip_tags(trim($value));  // here was a closing parentheses ) to much.
	

		if(strlen($_POST['firstname']) < 3) // $_POST not $post.
		{
			$errors[] = 'Le prénom doit comporter au moins 3 caractères';		
		}

		if(strlen($_POST['lastname']) < 3) // $_POST not $post.
		{
		$errors[] = 'Le nom doit comporter au moins 3 caractères';
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) // filter var not filter variable. // $_POST not $post.
		{
		$errors[] = 'L\'adresse email est invalide';
		}

		if(empty($_POST['birthdate'])) // $_POST not $post.
		{
		$errors[] = 'La date de naissance doit être complétée';
		}

		if(empty($_POST['city'])) // $_POST not $post.
		{
			$errors[] = 'La ville ne peut être vide';
		}

		if(count($error) > 0) // there is an error here, i guess.
		{ 
			// error = 0 = insertion user
			$insertUser = $db->prepare('INSERT INTO users (gender, firstname, lastname, email, birthdate, city) VALUES(:gender, :firstname, :lastname, :email, :birthdate, :city)');
			$insertUser->bindValue(':gender', $post['gender']);
			$insertUser->bindValue(':firstname', $post['fistname']);
			$insertUser->bindValue(':lastname', $post['lastname']); // a closing semikolon was missing here.
			$insertUser->bindValue(':email', $post['email']);
			$insertUser->bindValue(':birthdate', date('Y-m-d', strtotime($post['birthdate'])));
			$insertUser->bindValue(':city', $post['city']);

			if($insertUser->execute())
			{
				$createUser = true;
			} 
			else 
			{ 
				$errors[] = 'Erreur SQL';
			}
		}
	}	
}

$queryUsers = $db->prepare('SELECT * FROM users' . $order);

if ($queryUsers->execute()) 
{
	$users = $queryUsers->fetchAll(); // here the -> was wrong (-- >).
}
//-----------------------------------------------------------------------------------------------------------
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Exercice 1</title>
		<meta charset="utf-8">
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	</head>

	<body>
	<!--In the whole body part below the code indentation was very bad -->
		<div class="container">

			<h1>Liste des utilisateurs</h1>
	
			<p>Trier par : 
				<a href="index.php?column=firstname&order=asc">Prénom (croissant)</a> |
				<a href="index.php?column=firstname&order=desc">Prénom (décroissant)</a> |
				<a href="index.php?column=lastname&order=asc">Nom (croissant)</a> |
				<a href="index.php?column=lastname&order=desc">Nom (décroissant)</a> |
				<a href="index.php?column=birthdate&order=desc">Âge (croissant)</a> |
				<a href="index.php?column=birthdate&order=asc">Âge (décroissant)</a>
			</p>

			<br>

			<div class="row">

				<?php

					if(isset($createUser) && $createUser == true)
					{
						echo '<div class="col-md-6 col-md-offset-3">';
						echo '<div class="alert alert-success">Le nouvel utilisateur a été ajouté avec succès.</div>';
						echo '</div><br>'; // a closing semikolon was missing here.
					}

					if(empty($errors))
					{
						echo '<div class="col-md-6 col-md-offset-3">';
						echo '<div class="alert alert-danger">'.implode('<br>',array($errors)).'</div>'; // array() missed in implode().
						echo '</div><br>';
					}
				?>
						
				<div class="col-md-7">
					<table class="table">
						<thead>
							<tr>
								<th>Civilité</th>
								<th>Prénom</th>
								<th>Nom</th>
								<th>Email</th>
								<th>Age</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($users as $user):?> 
								<tr>
									<td><?php echo $user['gender'];?></td>
									<td><?php echo $user['firstname'];?></td>
									<td><?php echo $user['lastname'];?></td>
									<td><?php echo $user['email'];?></td>
									<td><?php echo DateTime::createFromFormat('Y-m-d', $user['birthdate'])->diff(new DateTime('now'))->y;?> ans</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>

				<div class="col-md-5">

					<form method="post" class="form-horizontal well well-sm">
						<fieldset>
							<legend>Ajouter un utilisateur</legend>

								<div class="form-group">
									<label class="col-md-4 control-label" for="gender">Civilité</label>
									<div class="col-md-8">
										<select id="gender" name="gender" class="form-control input-md" required>
											<option value="Mlle">Mademoiselle</option>
											<option value="Mme">Madame</option><option value="M">Monsieur</option>
										</select>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-4 control-label" for="firstname">Prénom</label>

									<div class="col-md-8">
										<input id="firstname" name="firstname" type="text" class="form-control input-md" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label" for="lastname">Nom</label>  
									<div class="col-md-8">
										<input id="lastname" name="lastname" type="text" class="form-control input-md" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label" for="email">Email</label>  
									<div class="col-md-8">
										<input id="email" name="email" type="email" class="form-control input-md" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label" for="city">Ville</label>  
									<div class="col-md-8">
										<input id="city" name="city" type="text" class="form-control input-md" required>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-4 control-label" for="birthdate">Date de naissance</label>  
									<div class="col-md-8">
										<input id="birthdate" name="birthdate" type="text" placeholder="JJ-MM-AAAA" class="form-control input-md" required>
										<span class="help-block">au format JJ-MM-AAAA</span>  
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-4 col-md-offset-4">
										<button type="submit" class="btn btn-primary">Envoyer</button>
									</div>
								</div>
						</fieldset>
					</form>

				</div>

			</div>

		</div>

	</body>

</html>