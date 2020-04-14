if(process.env.NODE_ENV === 'production') {
	global.protocol = "https://";
} else {
	global.protocol = "http://";
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
/*	DREAMBUSTER---------------------*/
	if(req.path === "/halloffame")
		return fs.readdir(__dirname + '/static/hof', (err, files) => {
			if(err) throw err;
			else return res.render('halloffame.ejs', {assets:global.protocol + req.headers.host,host:global.protocol + req.headers.host,version:version,files:files})});
	else return res.render('index.ejs', {assets:global.protocol + req.headers.host,host:global.protocol + req.headers.host,version:version});
});

app.listen(6661, function(){
	console.log("Dream Buster server started on port 6661");
});
