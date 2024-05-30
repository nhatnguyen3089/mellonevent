
<div class="py-md-5 pb-5 dark-bg">
	
	<div class="container max-w-1600 text-center">
		<% if $TourImageBanner %>
			<img src="$TourImageBanner.URL" alt="$Title" class="img-fluid my-5 mx-auto">
		<% end_if %>
	</div>
	
	<div class="container page-content-container">
		
		<div class="row">
			<div class="col-lg-10 offset-lg-1 pb-5">
				
				<h1>$Title</h1>
				
				<div class="row">
					<div class="col-lg-8 col-md-7">
						<div class="article-content pt-5">
							$Content
						</div>
					</div>
					<div class="col-lg-4 col-md-5 pt-2">
						<div class="tour-metainfo-container p-4 text-uppercase">
							<p>
								<strong class="text-uppercase d-block mb-2">Event:</strong> 
								$Title
							</p>
							<% if $TourFeaturing %>
							<p>
								<strong class="text-uppercase d-block mb-2">Featuring:</strong> 
								$TourFeaturing
							</p>
							<% end_if %>
							<% if $TourDate %>
							<p>
								<strong class="text-uppercase d-block mb-2">Date:</strong> 
								$TourDate
							</p>
							<% end_if %>
							
							<% if $Venues %>
								<div>
									<strong class="text-uppercase d-block mb-0 fw-900">Venue:</strong> 
									<ul class="list-unstyled">
										<% loop $Venues %>
											<li>
												<a class="text-white" href="$Link">$Title</a><br>
											</li>
										<% end_loop %>
									</ul>
								</div>
							<% end_if %>
							
							<% if $BuyTicketLink || $TicketDescription %>
								<p>
									<strong class="text-uppercase d-block mb-2">Ticket:</strong> 
									<% if $TicketDescription %>
										$TicketDescription
									<% end_if %>
									<% if $BuyTicketLink %>
										<a target="_blank" href="$BuyTicketLink" class="btn btn-primary btn-green mt-2">Buy tickets</a>
									<% end_if %>
								</p>
							<% end_if %>
						</div>
					</div>
				</div>
				
				<div class="row py-5">
					<div class="col-12">
						<% if $TourInfos %>
					
							<div class="accordion" id="accordionTourInfo">
								<% if $TourArtists %>
									<div class="accordion-item mb-3 rounded-0 border-0 bg-transparent">
										<h2 class="accordion-header" id="artist_heading">
											<button class="accordion-button rounded-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#artist_collapse" aria-expanded="false" aria-controls="artist_collapse">
												<h6 class="my-0 fs-22">Artists</h6>
											</button>
										</h2>
										<div id="artist_collapse" class="accordion-collapse collapse" aria-labelledby="artist_heading" data-bs-parent="#accordionTourInfo" style="">
											<div class="accordion-body">
												<% loop $TourArtists %>
													<div class="row">
														<div class="col-sm-6">
															<img src="$Image.URL" alt="$Title" class="img-fluid mb-4">
														</div>
														<div class="col-sm-6">
															<h3>$Title</h3>
															<div class="artist_description_output">
																$Description
															</div>
														</div>
														<div class="col-12">
															<hr class="mb-5">
														</div>
													</div>
												<% end_loop %>
											</div>
										</div>
									</div>
								<% end_if %>
								
								<% loop $TourInfos %>
									<div class="accordion-item mb-3 rounded-0 border-0 bg-transparent">
										<h2 class="accordion-header" id="info_heading_$ID">
											<button class="accordion-button rounded-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#info_collapse_$ID" aria-expanded="false" aria-controls="info_collapse_$ID">
												<h6 class="my-0 fs-22">$Title</h6>
											</button>
										</h2>
										<div id="info_collapse_$ID" class="accordion-collapse collapse" aria-labelledby="info_heading_$ID" data-bs-parent="#accordionTourInfo" style="">
											<div class="accordion-body">
												$Description
											</div>
										</div>
									</div>
								<% end_loop %>
								
								<% if $TourPartners %>
									<div class="accordion-item mb-3 rounded-0 border-0 bg-transparent">
										<h2 class="accordion-header" id="partner_heading">
											<button class="accordion-button rounded-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#partner_collapse" aria-expanded="false" aria-controls="partner_collapse">
												<h6 class="my-0 fs-22">Partners</h6>
											</button>
										</h2>
										<div id="partner_collapse" class="accordion-collapse collapse" aria-labelledby="partner_heading" data-bs-parent="#accordionTourInfo" style="">
											<div class="accordion-body">
												<div class="row">
													<% loop $TourPartners %>
														<div class="col-sm-6 col-md-4 col-lg-3">
															<img src="$Image.URL" alt="$Title" class="img-fluid mb-4">
														</div>
													<% end_loop %>
												</div>
											</div>
										</div>
									</div>
								<% end_if %>
								
							</div>

						<% end_if %>
					</div>
				</div>
				
			</div>
		</div>
		
		
	</div>
</div>

