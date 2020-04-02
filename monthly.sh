#!/bin/bash
if [[ $EUID -ne 0 ]]; then
	echo "This script must be run as root" 1>&2
	exit 1
fi
echo "--FLUSHING LOGS"
pm2 flush
echo "--UPDATING NPM"
npm install -g npm
echo "--UPDATING PM2"
npm install pm2@latest -g
pm2 update
echo "--UPDATING UBUNTU PACKAGES"
apt-get update
echo "--UPGRADING UBUNTU PACKAGES"
apt-get upgrade
echo "--BYE BYE"
reboot