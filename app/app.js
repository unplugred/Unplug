const fs = require('fs');
const express = require('express');
const app = express();
var version = 0
app.set('view engine', 'ejs');
app.set('views', __dirname + '/views/')

//remove slashes
app.use((req, res, next) => {
	const test = /\?[^]*\//.test(req.url);
	if (req.url.substr(-1) === '/' && req.url.length > 1 && !test)
		res.redirect(301, req.url.slice(0, -1));
	else
	{
		//log
		if(req.headers.host === undefined)
		{
			if(req.hostname === undefined)
				console.log("^" + req.protocol + "://????" + req.originalUrl);
			else
				console.log("^" + req.protocol + "://" + req.hostname + ":????" + req.originalUrl);
		}
		else console.log("^" + req.protocol + "://" + req.headers.host + req.originalUrl);

		//lowercase
		req.url = req.url.toLowerCase();
		req.path = req.path.toLowerCase();
		next();
	}
});

//subdomains
app.get('*', function(req, res, next){
	//weird error
	if(req.headers.host === undefined)
	{
		res.status(404).sendFile(__dirname + '/hidden/wildcard.html');
		return;
	}
	//global favicon
	if(req.path === "/favicon.ico" && !req.hostname.startsWith("dreambuster."))
	{
		res.sendFile(__dirname + '/hidden/favicon.ico');
		return;
	}
	//electron
	else if(req.headers.host === "localhost:6660") {
		if(
		req.url.startsWith("/dreambuster") ||
		req.path === "/privacy-policy" ||
		req.path === "/brand-guidelines" ||
		req.path === "/feed") {
			res.status(404).render('pages/404',{assets:global.assets,host:req.hostname,version:version});
			return;
		}
		if(req.url === "/browser?6660") {
			res.render('electron/browser',{assets:global.assets,host:req.hostname,version:version});
			return;
		}
		if(req.url === "/bye?6660") {
			res.render('electron/bye',{assets:global.assets,host:req.hostname,version:version});
			return;
		}
		if(req.url === "/unplug?6660") {
			res.render('electron/unplug',{assets:global.assets,host:req.hostname,version:version});
			return;
		}
	}
	//normal website
	else if(req.hostname === 'www.unplug.red' || req.hostname === 'unplug.red' || req.hostname === 'localhost') {
		if(req.url.startsWith("/assets") || req.url.startsWith("/dreambuster"))
		{
			res.status(404).render('pages/404',{assets:global.assets,host:req.hostname,version:version});
			return;
		}
	}
	//assets
	else if(req.hostname.startsWith('assets.')) {
		req.url = '/assets' + req.url;
	}
	//rss
	else if(req.hostname.startsWith('rss.')) {
		res.set('Content-Type', 'text/xml');
		res.render('pages/feed',{assets:global.assets,host:req.hostname,version:version});
		return;
	}
	//dreambuster
	else if(req.hostname.startsWith('dreambuster.')) {
		req.url = '/dreambuster' + req.url;
	}
	//wildcard
	else {
		res.status(404).sendFile(__dirname + '/hidden/wildcard.html');
		return;
	}
	next();
});

//////////////SPECIFIC SHIT GOES HERE/////////////

//index
app.get('/', function(req, res) {
	res.render('partials/index',{assets:global.assets,host:req.hostname,version:version})
});

//rss
app.get('/feed', function(req, res) {
	res.set('Content-Type', 'text/xml');
	res.render('pages/feed',{assets:global.assets,host:req.hostname,version:version})
});

//important.txt
app.get('/important.txt', function(req, res) {
	res.download(__dirname + '/hidden/important.txt')
});

//dreambuster hall of fame
app.get('/dreambuster/halloffame', function(req, res) {
	fs.readdir('./static/dreambuster/hof', (err, files) => {
		res.render('partials/halloffame',{assets:req.protocol + "://" + req.hostname,host:req.hostname,version:version,files:files})
	});
});

//////////////SPECIFIC SHIT ENDS HERE/////////////

//assets
app.use(express.static(__dirname + '/static', {
	index: false,
	redirect: false,
	maxAge: 2592000000,
	setHeaders: function(res, path, stat) {
		res.set('Access-Control-Allow-Origin','*');
	}
}));

app.get('*', function(req, res) {
	//dream buster home
	if(req.hostname.startsWith('dreambuster.')) {
		res.render('partials/dreambuster',{assets:req.protocol + "://" + req.hostname,host:req.hostname,version:version});
		return;
	}
	//all other pages
	res.render("pages" + req.path + ".ejs", {assets:global.assets,host:req.hostname,version:version}, function(err, html) {
		if (err) {
			if (err.message.indexOf('Failed to lookup view') !== -1) {
				return res.status(404).render('pages/404',{assets:global.assets,host:req.hostname,version:version});
			}
			throw err;
		}
		res.send(html);
	});
});

fs.readdir(app.get('views') + '/pages', (err, files) => {
	version = ((files.length + 1)*.01).toFixed(2);

	//startup sequence
	const startseq = ([
   80,' '
,  80,' +------------------\\'
, 100,' | \\                 \\'
, 110,' |  \\                 \\'
, 120,' |   \\-----------------\\'
,  90,' |   |                 |'
,  80,' |   |    %%%  %%%     |'
,  80,' |   |   %%%%%%%%%%    |'
,  70,' \\   |    %%%%%%%%     |'
,  90,'  \\  |     %%%%%%      |'
, 100,'   \\ |       %%        |'
, 100,'    \\|                 |'
,  90,'     \\-----------------+'
,  80,' '
,  80,'Unplug, v' + version
,  90,'CUBE Tech Ltd.'
, 110,'All rights reserved.'
, 100,' '
,2000,' '
,1400,'Booting.'
, 800,'Booting..'
,1200,'Booting...'
,1000,'Booting....'
,1400,'Booting.....'
, 800,'Booting......'
,1200,'Booting.......'
,1000,'Booting........'
,2400,'Booting.........'
,  70,'Booted successfully!'
, 100,' '
, 120,'All systems operational.'
,  90,'Asset dir: ' + global.assets
,  80,' '
, 120,' '
,  80,'CUBE Tech Ltd. wishes you happy surfing!']).reverse();

	function seq() {
		if(startseq.length === 0) return;
		setTimeout(seq, startseq.pop());
		console.log(startseq.pop());
	}
	app.listen(global.portt, seq);
});