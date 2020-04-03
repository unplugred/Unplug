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

	read -p "[S]tart/[R]estart? " -n 1 -r
	echo
	if [[ $REPLY =~ ^[Ss]$ ]]
	then
		pm2 start ecosystem.config.js
		pm2 log
		exit 1
	fi

	if [[ $REPLY =~ ^[Rr]$ ]]
	then
		pm2 restart ecosystem.config.js
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

	read -p "[S]tart/[R]estart? " -n 1 -r
	echo
	if [[ $REPLY =~ ^[Ss]$ ]]
	then
		pm2 start ecosystem.config.js --env production
		pm2 log
		exit 1
	fi

	if [[ $REPLY =~ ^[Rr]$ ]]
	then
		pm2 restart ecosystem.config.js --env production
		pm2 log
		exit 1
	fi

	exit 1
fi

if [[ $REPLY =~ ^[Ee]$ ]]
then
	echo ELECTRON MODE

	read -p "[P]roduction/[D]ebug? " -n 1 -r
	echo
	if [[ $REPLY =~ ^[Pp]$ ]]
	then
		electron "./app/electprod.js"
		exit 1
	fi

	if [[ $REPLY =~ ^[Dd]$ ]]
	then
		electron "./app/electdebug.js"
		exit 1
	fi

	exit 1
fi