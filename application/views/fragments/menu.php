		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="#">%title%</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse d-flex justify-content-begin" id="navbar">
					<ul class="navbar-nav">
						<li class="nav-item<?php if($title == "Home"): echo(" active"); endif; ?>">
							<a class="nav-link" href="<?php echo($baseurl); ?>home">Home</a>
						</li>
						<li class="nav-item dropdown<?php if($title == ""): echo(" active"); endif; ?>">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
							<div class="dropdown-menu" aria-labelledby="dropdown-menu">
								<a class="dropdown-item" href="<?php echo($baseurl); ?>"></a>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo($baseurl); ?>user/logout">Uitloggen</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>