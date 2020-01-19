const fs = require('fs');
const express = require('express');
const app = express();
var version = 0
app.set('view engine', 'ejs');

//remove slashes
app.use((req, res, next) => {
	const test = /\?[^]*\//.test(req.url);
	if (req.url.substr(-1) === '/' && req.url.length > 1 && !test)
		res.redirect(301, req.url.slice(0, -1));
	else
	{
		req.headers.host = req.headers.host.toLowerCase();
		req.url = req.url.toLowerCase();
		next();
	}
});

//evil bots
app.get('/wp-login', (req, res) => res.send('fuck off'));
app.get('/wp-login.php', (req, res) => res.send('fuck off'));
app.get('/user/login', (req, res) => res.send('fuck off'));
app.get('/user/login.php', (req, res) => res.send('fuck off'));
app.get('/administrator', (req, res) => res.send('fuck off'));
app.get('/administrator/index', (req, res) => res.send('fuck off'));
app.get('/administrator/index.php', (req, res) => res.send('fuck off'));

//subdomains
app.get('*', function(req, res, next){
	if(req.headers.host != "localhost")
	{
		if(req.headers.host == 'www.unplug.red' || req.headers.host == 'unplug.red')
		{
			if(req.url.startsWith("/assets") || req.url.startsWith("/dreambuster"))
				res.render('pages/404',{assets:GLOBAL.assets,host:req.headers.host,version:version});
		}
		else if(req.headers.host == 'assets.unplug.red')
		{
			req.url = '/assets' + req.url;
		}
		else if(req.headers.host == 'rss.unplug.red')
		{
			res.set('Content-Type', 'text/xml');
			res.render('pages/feed',{assets:GLOBAL.assets,host:req.headers.host,version:version});
			return;
		}
		else if(req.headers.host == 'dreambuster.unplug.red')
		{
			req.url = '/dreambuster' + req.url;
		}
		else
		{
			console.log(req.headers.host + req.url);
			res.render('partials/wildcard',{assets:GLOBAL.assets,host:req.headers.host,version:version});
			return;
		}
	}
	next();
});

//////////////SPECIFIC SHIT GOES HERE/////////////

//index
app.get('/', function(req, res) {
	res.render('pages/index',{assets:GLOBAL.assets,host:req.headers.host,version:version})
});

//rss
app.get('/feed', function(req, res) {
	res.set('Content-Type', 'text/xml');
	res.render('pages/feed',{assets:GLOBAL.assets,host:req.headers.host,version:version})
});

//important.txt
app.get('/important.txt', function(req, res) {
	res.download('static/important.txt')
});

//dreambuster hall of fame
app.get('/dreambuster/halloffame', function(req, res) {
	fs.readdir('./static/dreambuster/hof', (err, files) => {
		res.render('pages/dreambuster/halloffame',{assets:GLOBAL.assets,host:req.headers.host,version:version,files:files})
	});
});

//////////////SPECIFIC SHIT ENDS HERE/////////////

//assets
app.use(express.static('static', {
	index: false,
	redirect: false,
	maxAge: 2592000000
}));

//pages
app.get('*', function(req, res) {
	const viewdir = app.get('views') + "/pages";
	if(req.headers.host == 'dreambuster.unplug.red')
	{
		res.render('pages/dreambuster/404',{assets:GLOBAL.assets,host:req.headers.host,version:version});
		return;
	}
	fs.access(viewdir + req.path + ".ejs", fs.F_OK, (err) => {
		if (err) {
			res.render('pages/404',{assets:GLOBAL.assets,host:req.headers.host,version:version});
			return;
		}

		res.render('pages/' + req.path,{assets:GLOBAL.assets,host:req.headers.host,version:version});
	});
});

fs.readdir('./views/pages', (err, files) => {
	version = ((files.length - 1)*.01).toFixed(2);

	//startup sequence
	const startseq = ([
   80,' '
,  80,'+------------------\\'
, 100,'| \\                 \\'
, 110,'|  \\                 \\'
, 120,'|   \\-----------------\\'
,  90,'|   |                 |'
,  80,'|   |    %%%  %%%     |'
,  80,'|   |   %%%%%%%%%%    |'
,  70,'\\   |    %%%%%%%%     |'
,  90,' \\  |     %%%%%%      |'
, 100,'  \\ |       %%        |'
, 100,'   \\|                 |'
,  90,'    \\-----------------+'
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
,  90,'Asset dir: ' + GLOBAL.assets
,  80,' '
, 120,' '
,  80,'CUBE Tech Ltd. wishes you happy surfing!']).reverse();

	function seq()
	{
		if(startseq.length === 0) return;
		setTimeout(seq, startseq.pop());
		console.log(startseq.pop());
	}
	app.listen(80, seq);
});