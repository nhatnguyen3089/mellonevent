<div class="container-fluid footer-form-container">
	<div class="container-lg">
		<form id="CompactSubscribeForm" action="/subscribe/SubscribeForm" method="post">
			<div class="row">
				
				<div class="col-12">
					<div class="text-center mt-3 py-4">
						<p class="footer-form-headline text-uppercase">
							Subscribe to access pre sale tickets and tour announcements first
						</p>
					</div>
				</div>
				
				<div class="col-md-9 col-lg-10 form-group-item">
					<div class="row">
						<div class="col-sm-4">
							<input name="Name" type="text" class="form-control" placeholder="Name:">
						</div>
						<div class="col-sm-4">
							<input name="Surname" type="text" class="form-control" placeholder="Surname:">
						</div>
						<div class="col-sm-4">
							<input name="Email" type="email" class="form-control" placeholder="Email:">
						</div>
					</div>
				</div>
				<div class="col-md-3 col-lg-2 form-group-item form-group-item-action">
					<button type="submit" class="btn btn-primary btn-black mt-1">Subscribe</button>
					<input type="hidden" name="SecurityID" value="$SubscribeForm.SecurityID">
					<input type="hidden" name="SubscribeID" value="29" class="hidden form-group--no-label" id="Form_SubscribeForm_SubscribeID">
				</div>
				
				<div class="col-12 text-center msg_output mt-2"></div>
				
			</div>
		</form>
	</div>
</div>