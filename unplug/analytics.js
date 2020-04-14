const fs = require("fs");

fs.readFile('../logs/out.log','utf8',function(err,contents){
	let dict = {};
	let file = contents.split("\n");
	let total = 0;
	for(i = 0; i < file.length; i++){
		line = file[i].substring(21);
		if(line[0] === "^") {
			total++;
			if(dict[line] === undefined) dict[line] = 1;
			else dict[line]++;
		}
	}
	let items = Object.keys(dict).map(function(key) {
		return [key.substring(1), dict[key]];
	});
	items.sort(function(first,second){
		return second[1] - first[1];
	});
	let report = "REPORT\nTotal: " + total + "\nDiversity: " + items.length;
	for(i = 0; i < items.length; i++){
		report += "\n" + items[i][0] + ": " + items[i][1];
	}
	console.log(report);
});