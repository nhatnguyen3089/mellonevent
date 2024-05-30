
<% include HeroBanner Title=$Title, Venue='Venue' %>

<% include SubscribeCTA %>

<div class="py-md-5 pb-5 dark-bg">
	<div class="container py-5 page-content-container">
		
		<div class="row">
			
			<div class="col-md-7">
			
				<h1 class="fw-900">$Title</h1>
				<div class="article-content mt-4">
					$Content
				</div>
				<% if $VenueInfos %>
					
					<div class="accordion" id="accordionVenueInfo">
						<% loop $VenueInfos %>
							<div class="accordion-item mb-3 rounded-0 border-0 bg-transparent">
								<h2 class="accordion-header" id="heading_$ID">
									<button class="accordion-button rounded-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_$ID" aria-expanded="false" aria-controls="collapse_$ID">
										<h6 class="my-0 fs-22">$Title</h6>
									</button>
								</h2>
								<div id="collapse_$ID" class="accordion-collapse collapse" aria-labelledby="heading_$ID" data-bs-parent="#accordionVenueInfo" style="">
									<div class="accordion-body">
										$Description
									</div>
								</div>
							</div>
						<% end_loop %>
					</div>

				<% end_if %>
			</div>
			
			<div class="col-md-5">
				
				<% if $Image %>
					<img src="$Image.URL" alt="$Name" class="img-fluid mb-5">
				<% end_if %>
				
				<% if $Map %>
					<img src="$Map.URL" alt="$Name" class="img-fluid mb-5">
				<% end_if %>
				
			</div>
			
		</div>
		
		
	</div>
</div>

