<% include HeroBanner %>

<% include SubscribeCTA %>

<div class="py-md-5 pb-5 dark-bg">
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-2">
				<h1 class="fw-900 text-uppercase">$Title</h1>
			</div>
			<div class="col-lg-10">
				<div class="about-content">
					$Content
				</div>
				<div class="btn-enquire">
					<a class="btn btn-primary btn-green" href="/contact">Enquire today</a>
				</div>
			</div>
		</div>
		
		
		<div class="about-info-items">	
			<% loop $AboutInfos %>
				<div class="row">
					<div class="col-12 py-md-5">
						<div class="row">
							<% if $EvenOdd == 'odd' %>
								<div class="col-lg-4 about-info-items-image">
									<img src="$Image.URL" alt="$Title" class="img-fluid">
								</div>
								<div class="col-lg-8">
									<h4 class="text-uppercase mt-md-4">$Title</h4>
									<div class="mb-2">$Description</div>
								</div>
							<% else %>
								<div class="col-lg-8">
									<h4 class="text-uppercase mt-md-4">$Title</h4>
									<div class="mb-2">$Description</div>
								</div>
								<div class="col-lg-4 about-info-items-image">
									<img src="$Image.URL" alt="$Title" class="img-fluid">
								</div>
							<% end_if %>
						</div>
					</div>
					
					<div class="col-12">
						<hr class="my-4">
					</div>
				</div>
			<% end_loop %>	
		</div>
		
		
	</div>
</div>
