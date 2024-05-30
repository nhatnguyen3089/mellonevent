
<% include HeroBanner %>

<% include SubscribeCTA %>

<div class="py-md-5 dark-bg">
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-7">
				<h5 class="fw-900 text-uppercase">Reach out to us today</h5>
				<div class="contact-content">
					$Content
				</div>
			</div>
			
			<div class="col-md-1 d-none d-md-block">
				<div class="vertical-line"></div>
			</div>
			
			<div class="col-md-4 py-4">
				<% if $SiteConfig.PhoneNumber %>
					<p>
						<svg class="me-2" id="noun_Phone_2283479" xmlns="http://www.w3.org/2000/svg" width="14.949" height="14.949" viewBox="0 0 14.949 14.949">
						  <path id="Path_2" data-name="Path 2" d="M7.983,8.158l.666-1A.94.94,0,0,0,8.66,6.135L6.665,3,4.29,3.791a1.867,1.867,0,0,0-1.2,2.324A17.987,17.987,0,0,0,7.66,13.289a18,18,0,0,0,7.175,4.574,1.868,1.868,0,0,0,2.324-1.205l.791-2.374L14.814,12.29a.938.938,0,0,0-1.026.011l-1,.665a.929.929,0,0,1-1.01.021,11.86,11.86,0,0,1-3.82-3.819.931.931,0,0,1,.021-1.01" transform="translate(-3 -3)" fill="#149548" fill-rule="evenodd"/>
						</svg>
						<a class="text-white" href="tel:$SiteConfig.PhoneNumber">$SiteConfig.PhoneNumber</a>
					</p>
				<% end_if %>
				
				<% if $SiteConfig.EmailAddress %>
					<p>
						<svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16.878" height="13.502" viewBox="0 0 16.878 13.502">
						  <path id="Icon_metro-mail" data-name="Icon metro-mail" d="M20.332,7.712H6.829A1.68,1.68,0,0,0,5.15,9.4L5.141,19.527a1.687,1.687,0,0,0,1.688,1.688h13.5a1.687,1.687,0,0,0,1.688-1.688V9.4A1.687,1.687,0,0,0,20.332,7.712Zm0,3.376-6.751,4.22-6.751-4.22V9.4l6.751,4.22L20.332,9.4v1.688Z" transform="translate(-5.141 -7.712)" fill="#149548"/>
						</svg>
						<a class="text-white" href="tel:$SiteConfig.PhoneNumber">$SiteConfig.EmailAddress</a>
					</p>
				<% end_if %>

				<% if $SiteConfig.Address %>
					<p>
						<svg class="me-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="13.484" height="20.361" viewBox="0 0 13.484 20.361">
						  <defs>
							<clipPath id="clip-path">
							  <rect id="Rectangle_497" data-name="Rectangle 497" width="13.484" height="20.361" fill="#149548"/>
							</clipPath>
						  </defs>
						  <g id="Group_520" data-name="Group 520" clip-path="url(#clip-path)">
							<path id="Path_310" data-name="Path 310" d="M46.375,40A6.375,6.375,0,0,0,40,46.375c0,3.521,6.375,12.962,6.375,12.962S52.75,49.9,52.75,46.375A6.375,6.375,0,0,0,46.375,40m0,10.109a3.916,3.916,0,1,1,3.916-3.916,3.916,3.916,0,0,1-3.916,3.916" transform="translate(-39.633 -39.633)" fill="#149548"/>
							<path id="Path_311" data-name="Path 311" d="M6.742,20.36l-.3-.451c-.016-.024-1.62-2.4-3.2-5.185C1.089,10.952,0,8.266,0,6.741A6.744,6.744,0,0,1,12.954,4.117a6.7,6.7,0,0,1,.53,2.624c0,1.525-1.089,4.21-3.235,7.983-1.582,2.78-3.186,5.161-3.2,5.185Zm0-19.626A6.014,6.014,0,0,0,.735,6.741c0,1.375,1.085,4.009,3.137,7.616,1.16,2.039,2.332,3.861,2.87,4.681.538-.82,1.71-2.642,2.87-4.681,2.052-3.607,3.137-6.24,3.137-7.616A6.014,6.014,0,0,0,6.742.734m0,10.109a4.271,4.271,0,1,1,1.667-.337,4.257,4.257,0,0,1-1.667.337m0-7.832a3.548,3.548,0,1,0,3.549,3.548A3.553,3.553,0,0,0,6.742,3.011" transform="translate(0 0.001)" fill="#149548"/>
						  </g>
						</svg>

						$SiteConfig.Address
					</p>
				<% end_if %>
			</div>
		</div>
		
		<div class="container-lg mt-5">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 pb-5 px-0">
					<div class="bg-green text-white position-relative">
						
						<div class="row">
							<div class="col-md-6 col-lg-5 text-center py-5 ps-4 ps-sm-4 ps-md-5 pe-4 centered-form">
								<h3 class="text-uppercase mb-4">Let's chat!</h3>
								<div class="contact-form-container">
									$ContactForm
								</div>
								<div class="text-center msg_output"></div>
								<div class="clearfix my-5"></div>
								<% include SocialIcons %>
							</div>
							<div class="col-md-6 col-lg-7">
								<div style="width: 100%; margin-bottom: -9px"><iframe width="100%" height="620" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=$SiteConfig.Address+(Mellen%20Events)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>


	</div>
</div>