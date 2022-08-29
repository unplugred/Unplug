if(process.env.NODE_ENV === 'production') {
	global.protocol = "https://";
	global.assets = "https://assets.unplug.red";
} else {
	global.protocol = "http://";
	global.assets = "http://assets.localhost";
}
const fs = require('fs');
const express = require('express');
const app = express();
app.set('view engine', 'ejs');
app.set('views', __dirname + "/pages");

app.use((req, res, next) => {
//lowercase
	req.url = req.url.toLowerCase();
	req.path = req.path.toLowerCase();
	next();
});

app.use(express.static(__dirname + '/static', {
	index: false,
	redirect: false,
	maxAge: 2592000000,
	setHeaders: function(res,path,stat) {
		res.set('Access-Control-Allow-Origin','*');
	}
}));

app.use((req, res, next) => {
/*	VST---------------------*/
	if(req.path == "/stylesheet.css")
		return res.type('text/css').set({
			'Cache-Control':'public, max-age=2592000',
			'Access-Control-Allow-Origin':'*'
		}).render('stylesheet.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets});
	else if(req.path.startsWith("/newdesign"))
		return res.render('newdesign.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path});
	else
		return res.render('index.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path});
});

app.listen(6665, function(){
	console.log("VST server started on port 6665");
});
