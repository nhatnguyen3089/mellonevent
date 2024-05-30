
<% include HeroBanner %>

<% include SubscribeCTA %>

<div class="py-5 dark-bg">
	<div class="container">
	
		<% if $Venues %>
			
			<div class="row">
				<% loop $Venues %>
					<% if ShowInMenus %>
						<div class="col-md-6">
							<div class="image-container position-relative mb-4 text-center">
								<a href="$Link">
									<img src="$Image.URL" alt="$Name" class="img-fluid">
									<div class="tour-overlay">
										<div class="tour-overlay-text">
											<h4>$Title</h4>
											<h5>$Address</h5>
										</div>
									</div>
								</a>
							</div>
						</div>
					<% end_if %>
				<% end_loop %>
			</div>

		<% else %>
			<p>No venues found.</p>
		<% end_if %>
	</div>
</div>
