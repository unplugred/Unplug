const fs = require('fs');
const express = require('express');
const app = express();
global.assets = global.protocol + "assets." + global.domain;
var version = 0
app.set('view engine', 'ejs');
app.set('views', __dirname + "/pages");

app.use((req, res, next) => {

//remove slashes
	const test = /\?[^]*\//.test(req.url);
	if (req.url.substr(-1) === '/' && req.url.length > 1 && !test)
		return res.redirect(301, req.url.slice(0, -1));

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

//weird error
	if(req.headers.host === undefined || req.hostname === undefined)
		return res.status(404).sendFile(__dirname + '/hidden/wildcard.html');

//favicon
	if(req.hostname !== 'dreambuster.' + global.domain && req.path === "/favicon.ico")
		return res.sendFile(__dirname + '/hidden/favicon.ico');

	return next();
});

/*	DREAMBUSTER---------------------*/
app.use((req, res, next) => {
	if(req.hostname !== 'dreambuster.' + global.domain) return next();

	if(req.path === "/halloffame") fs.readdir('./static/dreambuster/hof', (err, files) => {
		return res.render('dreambuster/halloffame.ejs', {assets:global.protocol + req.hostname,host:global.protocol + req.hostname,version:version,files:files})});

	return next();
});


/*	ELECTRON------------------------*/
app.use((req, res, next) => {
	if(global.domain !== "localhost:6660") return next();

	if(
	req.path === "/privacy-policy" ||
	req.path === "/brand-guidelines" ||
	req.path === "/feed")
		return res.status(404).render('partials/404.ejs',{assets:global.assets,host:global.protocol + req.hostname,version:version});

	if(req.url.endsWith("?6660")) {
		if(req.path === "/browser")
			return res.render('electron/browser.ejs',{assets:global.assets,host:global.protocol + req.hostname,version:version});
		if(req.path === "/bye")
			return res.render('electron/bye.ejs',{assets:global.assets,host:global.protocol + req.hostname,version:version});
		if(req.path === "/unplug")
			return res.render('electron/unplug.ejs',{assets:global.assets,host:global.protocol + req.hostname,version:version});
	}

	return next();
});

/*	RSS-----------------------------*/
app.use((req, res, next) => {
	if(req.hostname !== 'rss.' + global.domain) return next();
	res.set('Content-Type', 'text/xml');
	return res.render('partials/feed.ejs', {assets:global.protocol + req.hostname,host:global.protocol + req.hostname,version:version});
});

/*	UNPLUG--------------------------*/
app.use((req, res, next) => {
	if(req.hostname !== 'www.' + global.domain && req.hostname !== global.domain) return next();

	//index
	if(req.path === '/')
		return res.render('partials/index.ejs',{assets:global.assets,host:global.protocol + req.hostname,version:version});

	//rss
	if(req.path === '/feed') {
		res.set('Content-Type', 'text/xml');
		return res.render('partials/feed.ejs',{assets:global.assets,host:global.protocol + req.hostname,version:version});
	}

	//important.txt
	if(req.path === '/important.txt')
		return res.download(__dirname + '/static/unplug/important.txt');

	return res.render("unplug" + req.path + ".ejs", {assets:global.assets,host:global.protocol + req.hostname,version:version}, function(err, html) {
		if(err) {
			if(err.message.indexOf('Failed to lookup view') !== -1) return next();
			throw err;
		}
		return res.send(html);
	});
});

/*	ASSETS--------------------------*/
app.use((req, res, next) => {
	if(req.hostname === 'www.' + global.domain || req.hostname.startsWith("localhost")) req.url = "unplug" + req.path;
	req.url = req.hostname.substring(0,req.hostname.indexOf(".")) + req.path;
	return next();
});
app.use(express.static(__dirname + '/static', {
	index: false,
	redirect: false,
	maxAge: 2592000000,
	setHeaders: function(res, path, stat) {
		res.set('Access-Control-Allow-Origin','*');
	}
}));


/*	404-----------------------------*/
app.get('*', function(req, res) {
	if(	req.hostname === global.domain ||
		req.hostname === 'assets.' + global.domain ||
		req.hostname === 'www.' + global.domain)
		return res.status(404).render('partials/404.ejs',{assets:global.assets,host:global.protocol + req.hostname,version:version});
	else if(req.hostname === 'dreambuster.' + global.domain)
		return res.render('dreambuster/index.ejs', {assets:global.protocol + req.hostname,host:global.protocol + req.hostname,version:version});
	return res.status(404).sendFile(__dirname + '/hidden/wildcard.html');
});



fs.readdir(__dirname + '/pages/unplug', (err, files) => {
	version = ((files.length + 2)*.01).toFixed(2);

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