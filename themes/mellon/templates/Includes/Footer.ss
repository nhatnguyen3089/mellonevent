<footer class="bg-black position-relative">
	<div class="footer-icon-container d-none d-lg-block d-xl-block d-xxl-block">
		Logo Here
	</div>
	<div class="container-fluid pt-3 pt-lg-5">
		<div class="row">
			<div class="col-lg-3 text-center">
				<p class="text-uppercase">Mellon Events 2023</p>
				<% include SocialIcons %>
				<p class="mt-3 text-uppercase">
					Web design by Nhat Nguyen
				</p>
				
				<div class="footer-site-description">$SiteConfig.SiteDescription</div>
				
			</div>
			<div class="col-lg-6 text-center">
				<div class="d-block footer-logo-container mb-5">
					<a href="/">
						Logo here
					</a>
				</div>
				
				<ul class="list-unstyled d-md-flex justify-content-center footer-menu text-uppercase">
				  <li class="me-3"><a href="/current-events" class="text-white text-decoration-none">Current events</a></li>
				  <li class="me-3"><a href="/about" class="text-white text-decoration-none">About</a></li>
				  <li class="me-3"><a href="/contact" class="text-white text-decoration-none">Contact</a></li>
				  <li class="me-3"><a href="/past-events" class="text-white text-decoration-none">Past event</a></li>
				</ul>
				
				<p class="footer-address">
					<% if $SiteConfig.Address %>$SiteConfig.Address<% end_if %> <% if $SiteConfig.EmailAddress %> | <a class="text-white" href="mailto:$SiteConfig.EmailAddress">$SiteConfig.EmailAddress</a><% end_if %> <% if $SiteConfig.PhoneNumber %> | <a class="text-white" href="tel:$SiteConfig.PhoneNumber">$SiteConfig.PhoneNumber</a><% end_if %>
				</p>
				
			</div>
		</div>
	</div>
</footer