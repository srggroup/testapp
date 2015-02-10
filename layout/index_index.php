/** extends layout **/


/** block content **/

			<div class="userIndex">

				<ul class="users">
				<? foreach($context->users as $user){?>

					<li class="user" data-id="<?=$user->getId();?>">
						<? if($user->getAvatar()){ ?><img alt="<?=$user->getUsername();?>" src="<?=$user->getAvatar();?>" /><? } ?>
						<h4><?=$user->getName();?></h4>
						<p class="username"><?=$user->getUsername();?></p>
						<p class="email"><?=$user->getEmail();?></p>
						<p class="gender"><?=$user->getGender();?></p>

						<a href="javascript:void(0)" class="edit">Edit</a>
						<a href="javascript:void(0)" class="delete">Delete</a>
					</li>

				<? } ?>

				</ul>

			</div>

/** endblock **/
