#!/bin/bash
pm2 install pm2@latest -g
pm2 update
apt-get update
apt-get upgrade
reboot