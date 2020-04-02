#!/bin/bash
read -p "[D]ebug/[P]roduction/[E]lectron? " -n 1 -r
echo
if [[ $REPLY =~ ^[Dd]$ ]]
then
	echo "DEBUG MODE"
	if [[ $EUID -ne 0 ]]
	then
		echo "This script must be run as root" 1>&2
		exit 1
	fi
	cd app

	read -p "[S]tart/[R]estart? " -n 1 -r
	echo
	if [[ $REPLY =~ ^[Ss]$ ]]
	then
		pm2 start servdebug.js --time -l "../logs/combined.log" -o "../logs/out.log" -e "../logs/"
		pm2 log
		exit 1
	fi

	if [[ $REPLY =~ ^[Rr]$ ]]
	then
		pm2 restart servdebug.js --time -l "../logs/combined.log" -o "../logs/out.log" -e "../logs/"
		pm2 log
		exit 1
	fi

	exit 1
fi

if [[ $REPLY =~ ^[Pp]$ ]]
then
	echo PRODUCTION MODE
	if [[ $EUID -ne 0 ]]
	then
		echo "This script must be run as root" 1>&2
		exit 1
	fi

	git pull
	cd app

	read -p "[S]tart/[R]estart? " -n 1 -r
	echo
	if [[ $REPLY =~ ^[Ss]$ ]]
	then
		pm2 start servprod.js --time -l "../logs/combined.log" -o "../logs/out.log" -e "../logs/"
		pm2 log
		exit 1
	fi

	if [[ $REPLY =~ ^[Rr]$ ]]
	then
		pm2 restart servprod.js --time -l "../logs/combined.log" -o "../logs/out.log" -e "../logs/"
		pm2 log
		exit 1
	fi

	exit 1
fi

if [[ $REPLY =~ ^[Ee]$ ]]
then
	echo ELECTRON MODE
	cd app

	read -p "[P]roduction/[D]ebug? " -n 1 -r
	echo
	if [[ $REPLY =~ ^[Pp]$ ]]
	then
		electron electprod.js
		exit 1
	fi

	if [[ $REPLY =~ ^[Dd]$ ]]
	then
		electron electdebug.js
		exit 1
	fi

	exit 1
fi