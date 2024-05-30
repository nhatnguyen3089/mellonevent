<% include HeroBanner %>

<div class="py-md-5 pb-5 dark-bg">
	<div class="container mt-5">
		<div class="row">
			<div class="col-lg-5 py-md-5">
				<h4 class="fw-900 text-uppercase mt-md-5 mb-md-5">Subscribe to access pre sale tickets and tour announcements first</h4>
				<div class="subscribe-content">
					$Content
				</div>
			</div>
			
			<div class="col-lg-7">
				
				<div class="row">
					<div class="col-12 pb-5">
						<div class="bg-green text-white py-4 px-3 px-sm-5 subscription-form-container subscribe-form-icon">
							
							<h3 class="mb-4 fw-900">Subscribe to our mailing list</h3>
							<% if $SubscribeForm %>
								<form id="FullSubscribeForm" action="{$Link}SubscribeForm" method="post" class="row">
									<div class="col-md-6 form-group-item">
										<% loop $SubscribeForm.Fields %>
											<% if $Name == 'Name' || $Name == 'Surname' || $Name == 'Email' || $Name == 'PhoneNumber' || $Name == 'PostalAddress' || $Name == 'Suburb' || $Name == 'PostalCode' %>
												<div class="form-group">
													$Field
													<% if $Message %>
														<div class="invalid-feedback">$Message</div>
													<% end_if %>
												</div>
											<% end_if %>
										<% end_loop %>
									</div>
									<div class="col-md-6 form-group-item">
										<% loop $SubscribeForm.Fields %>
											<% if $Name == 'State' || $Name == 'Country' || $Name == 'Interests' || $Name == 'SubscribeID' %>
												<div class="form-group">
													$Field
													<% if $Message %>
														<div class="invalid-feedback">$Message</div>
													<% end_if %>
												</div>
											<% end_if %>
										<% end_loop %>
									</div>
									
									<div class="col-md-6 form-group-item">
										<% loop $SubscribeForm.Fields %>
										
											<% if $Name == 'MailListPermission' %>
												<div class="form-group mailList-permission-form-group">
													$Field 
													<label for="Form_SubscribeForm_MailListPermission">$Title</label>
												</div>
											<% end_if %>
											
										<% end_loop %>
									</div>
									
									<div class="col-md-6 form-group-item">
										<div class="row">
											<div class="col-12">
												<input type="hidden" name="SecurityID" value="$Form.SecurityID" />
												<button type="submit" class="btn btn-primary btn-black">Subscribe</button>
											</div>
										</div>
									</div>
									
									<div class="col-12 msg_output mt-2"></div>
									
								</form>
							<% end_if %>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
</div>