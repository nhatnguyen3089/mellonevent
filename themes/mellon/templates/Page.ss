<!DOCTYPE html>

<html lang="$ContentLocale">
<head>
	<% base_tag %>
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=0">
	$MetaTags(false)
</head>
<body class="$ClassName.ShortName $URLSegment" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>

<% include Header %>

$Layout

<% if $URLSegment != 'subscribe' %>
<% include SubscribeForm %>
<% end_if %>

<% include Footer %>

</body>
</html>