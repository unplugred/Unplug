global.portt = 6660;
global.assets = "/assets";
require('./app/app.js');
const electron = require('electron');
var {app, BrowserWindow} = electron;
let mainWindow;

app.on('ready', function(){
	var res = electron.screen.getPrimaryDisplay().size;
	var vmin = Math.min(res.width, res.height);
	mainWindow = new BrowserWindow({
		width: res.width*.6 + vmin*.3,
		height: res.height*.6 + vmin*.3,
		x: res.width*.25 - vmin*.2,
		y: res.height*.2 - vmin*.15,
		darkTheme: true,
		frame: false,
		webPreferences: {
			nodeIntegration: true
		}
	});
	mainWindow.removeMenu();
	mainWindow.loadURL("http://localhost:6660/browser");
});