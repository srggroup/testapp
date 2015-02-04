/** extends layout **/


/** block content **/

			<h2>I'm extending Hello World</h2>

			<div class="userIndex">

				<ul class="users">
				<? foreach($context->users as $user){?>

					<li class="user">
						<p class="name"><?=$user->getName();?></p>
						<p class="username"><?=$user->getUsername();?></p>
						<p class="email"><?=$user->getEmail();?></p>
						<? if($user->getAvatar()){ ?><img alt="<?=$user->getUsername();?>" src="<?=$user->getAvatar();?>" /><? } ?>

						<a href="javascript:void(0)">Edit</a>
						<a href="javascript:void(0)">Delete</a>
					</li>

				<? } ?>

				</ul>

			</div>

/** endblock **/
