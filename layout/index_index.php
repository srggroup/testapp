/** extends layout **/


/** block content **/

			<div class="userIndex">

				<ul class="users">
				<? foreach($context->users as $user){?>

					<li class="user">
						<? if($user->getAvatar()){ ?><img alt="<?=$user->getUsername();?>" src="<?=$user->getAvatar();?>" /><? } ?>
						<h4><?=$user->getName();?></h4>
						<p class="username"><?=$user->getUsername();?></p>
						<p class="email"><?=$user->getEmail();?></p>

						<a href="javascript:void(0)">Edit</a>
						<a href="javascript:void(0)">Delete</a>
					</li>

				<? } ?>

				</ul>

			</div>

/** endblock **/
