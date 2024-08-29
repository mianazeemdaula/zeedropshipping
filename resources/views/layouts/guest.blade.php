<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','ZeeDropShipping')</title>
     <meta name="description" content="">
     <meta property="og:title" content="Zeed Dropshipping" />
     <meta property="og:url" content="{{ Request::url() }}"/>
     <meta property="og:description" content="Best-in-industry guides and information while cultivating a positive community."/>
     <meta property="og:image" content="https://www.example.com/sample.jpg"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1482469525706513');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1482469525706513&ev=PageView&noscript=1"
/></noscript>
</head> 
<body class="font-zeefont">
    @yield('content')
</body>
</html>