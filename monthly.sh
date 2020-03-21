#!/bin/bash
if [[ $EUID -ne 0 ]]; then
	echo "This script must be run as root" 1>&2
	exit 1
fi
pm2 flush
npm install -g npm
npm install pm2@latest -g
pm2 update
apt-get update
apt-get upgrade
reboot