<header >
	
	<div class="top-bar">
		<div class="container-fluid px-sm-2 px-md-2 px-lg-4 px-xl-5 px-xxl-5">
			<% include SocialIcons %>
			
			<a href="tel:$SiteConfig.EmailAddress" class="float-end top-email-icon"><svg xmlns="http://www.w3.org/2000/svg" width="30.707" height="24.566" viewBox="0 0 30.707 24.566">
			  <path id="Icon_metro-mail" data-name="Icon metro-mail" d="M32.778,7.712H8.212a3.057,3.057,0,0,0-3.055,3.071L5.141,29.207a3.07,3.07,0,0,0,3.071,3.071H32.778a3.07,3.07,0,0,0,3.071-3.071V10.783A3.07,3.07,0,0,0,32.778,7.712Zm0,6.141L20.495,21.53,8.212,13.854V10.783L20.495,18.46l12.283-7.677v3.071Z" transform="translate(-5.141 -7.712)" fill="#fff"/>
			</svg></a>
			
		</div>
	</div>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-lg max-w-1600">
			<!-- Centered logo -->
			<a class="navbar-brand" href="/">
				Logo Here
			</a>
			
			<!-- Toggler/collapsible Button -->
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<!-- Menu items -->
			<div class="collapse navbar-collapse" id="navbarNav">
				<% include Navigation %>
				
				<ul class="navbar-nav">
			
					<li class="nav-item<% if $URLSegment = 'about' %> current<% end_if %>">
						<a href="/about" class="nav-link">About</a>
					</li>
					
					<li class="nav-item<% if $URLSegment = 'contact' %> current<% end_if %>">
						<a href="/contact" class="nav-link">Contact</a>
					</li>
					
					<li class="nav-item<% if $URLSegment = 'past-events' %> current<% end_if %>">
						<a href="/past-events" class="nav-link">Past events</a>
					</li>
			
				</ul>
				
			</div>
		</div>
	</nav>
	
</header>


