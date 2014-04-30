		<div class="menu"><!-- start menu -->
			<ul class="mcd-menu">
				<li>
					<a href="index.php"<?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo(' class="active"'); ?>>
						<i class="icon1"></i>
						<strong>Začetna</strong>
					</a>
				</li>
				<li>
					<a href="recipes.php"<?php if(basename($_SERVER['PHP_SELF'])=="recipes.php") echo(' class="active"'); ?>>
						<i class="icon2"></i>
						<strong>Recepti</strong>
					</a>
				</li>
				<li>
					<a href="recipeadd.php"<?php if(basename($_SERVER['PHP_SELF'])=="recipeadd.php") echo(' class="active"'); ?>>
						<i class="icon3"></i>
						<strong>Dodaj recept</strong>
					</a>
				</li>
				<li>
					<a href="">
						<i class="icon4"></i>
						<strong>Nekaj</strong>
					</a>
				</li>
				<li>
					<a href="">
						<i class="icon5"></i>
						<strong>Nekaj</strong>
					</a>
				</li>
			</ul>
		</div><!-- end menu -->	