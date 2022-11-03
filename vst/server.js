if(process.env.NODE_ENV === 'production') {
	global.protocol = "https://";
	global.assets = "https://assets.unplug.red";
} else {
	global.protocol = "http://";
	global.assets = "http://assets.localhost";
}

//i dont wanna hear anything about bad practice.
const fs = require('fs');
eval(fs.readFileSync(__dirname + '/static/vsts.js').toString());

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
	if(process.env.NODE_ENV !== 'production' && req.path.startsWith("/setup"))
		return res.render('setup.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
	if(process.env.NODE_ENV !== 'production' && req.path.startsWith("/cover"))
		return res.render('cover.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
	else
		return res.render('index.ejs', {assets:global.protocol + req.headers.host,unplugassets:global.assets,host:global.protocol + req.headers.host,pagename:req.path,vsts:vsts});
});

app.listen(6665, function(){
	console.log("VST server started on port 6665");
});
