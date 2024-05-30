<ul class="navbar-nav">
	<% loop $Menu(1) %>
		<li class="$LinkingMode nav-item <% if $URLSegment = 'venues' && $Children.exists %>dropdown<% end_if %>">
			<a href="<% if $URLSegment = 'venues' %>javascript:;<% else %>$Link<% end_if %>" title="$Title.XML" class="nav-link <% if $URLSegment = 'venues' && $Children.exists %>dropdown-toggle<% end_if %>">$MenuTitle.XML</a>
			
                <% if $URLSegment = 'venues' && $Children.exists %>
                    <ul class="dropdown-menu">
                        <% loop $Children %>
                            <li class="dropdown-item">
								<a href="$Link">$MenuTitle</a>
							</li>
                        <% end_loop %>
                    </ul>
                <% end_if %>
            
		</li>
	<% end_loop %>
</ul>
