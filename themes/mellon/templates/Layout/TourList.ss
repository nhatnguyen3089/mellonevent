
<% if $URLSegment == 'current-events' %>
	<div id="carouselMellenEvents" class="carousel slide" data-bs-ride="carousel">
	  <div class="carousel-inner">
		<div class="carousel-item active">
			<img src="$ThemeDir/images/hero-image.jpg" class="w-100">
		</div>
	  </div>
	</div>
<% else %>
	<% include HeroBanner %>
<% end_if %>

<% include SubscribeCTA %>

<div class="py-5 dark-bg">
	<div class="container app-container">
	

		<% if $Tours %>
			
			<div class="row">
				<% loop $Tours %>
					<div class="col-md-6">
						
						<div class="image-container tour-image-wrapper position-relative text-center mb-4">
							<img class="w-100" src="$TourImage.URL" alt="$TourImage.Title">
							<div class="tour-overlay">
								<div class="tour-overlay-text">
									<a href="$Link">
										<h4>$Title</h4>
									</a>
									<h5>$TourDate</h5>
									<div>
										<a href="$Link" class="shadow-lg black-circle-btn">
											<svg xmlns="http://www.w3.org/2000/svg" width="18" height="36" viewBox="0 0 18 36">
												<path id="Icon_open-info" data-name="Icon open-info" d="M13.5,0A4.5,4.5,0,1,0,18,4.5,4.513,4.513,0,0,0,13.5,0ZM6.75,11.25A6.741,6.741,0,0,0,0,18H4.5A2.25,2.25,0,0,1,9,18c0,1.26-4.5,7.38-4.5,11.25A6.657,6.657,0,0,0,11.25,36,6.741,6.741,0,0,0,18,29.25H13.5a2.25,2.25,0,0,1-4.5,0c0-1.62,4.5-8.28,4.5-11.25A6.8,6.8,0,0,0,6.75,11.25Z" fill="#fff"/>
											</svg>
										</a>
										
									
										<% if $BuyTicketLink %>
											<a target="_blank" href="$BuyTicketLink" class="shadow-lg black-circle-btn buy-ticket-link">
												<svg xmlns="http://www.w3.org/2000/svg" width="40.449" height="39.333" viewBox="0 0 40.449 39.333">
												  <path id="Icon_awesome-ticket-alt" data-name="Icon awesome-ticket-alt" d="M7.54,10.155H26.391V21.466H7.54ZM31.1,15.811a2.828,2.828,0,0,0,2.828,2.828v5.655A2.828,2.828,0,0,1,31.1,27.121H2.828A2.828,2.828,0,0,1,0,24.293V18.638a2.828,2.828,0,0,0,2.828-2.828A2.828,2.828,0,0,0,0,12.983V7.328A2.828,2.828,0,0,1,2.828,4.5H31.1a2.828,2.828,0,0,1,2.828,2.828v5.655A2.828,2.828,0,0,0,31.1,15.811ZM28.276,9.684A1.414,1.414,0,0,0,26.863,8.27H7.069A1.414,1.414,0,0,0,5.655,9.684V21.937a1.414,1.414,0,0,0,1.414,1.414H26.863a1.414,1.414,0,0,0,1.414-1.414Z" transform="translate(-2.952 18.865) rotate(-41)" fill="#fff"/>
												</svg>
											</a>
										<% end_if %>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				<% end_loop %>
			</div>
			
		<% else %>
			<p>No tours found.</p>
		<% end_if %>
		
		
	</div>
</div>

