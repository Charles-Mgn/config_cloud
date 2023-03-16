#!/bin/bash

# Check if two arguments were provided to the script
if [ $# -ne 2 ]; then
    echo "Usage: $0 <user> <password>"
    exit 1
fi

user=$1
password=$2

app_path="/home/$user/public_html/"
log_file="/var/log/monitoring.log"
timestamp="$(date +%Y%m%d_%H%M%S)"

# Create backup tar gz file with database dump and app files in two separate folders. 

# Create backup folder if it doesn't exist
if [ ! -d "/home/$user/backup" ]; then
    mkdir /home/$user/backup
fi
echo "Backup folder created at $timestamp" >> $log_file

# Change to the app path directory to tar the app files from there
cd $app_path

# Create backup file for the database
if [ sudo mysqldump -u $user -p$password --all-databases > db.sql 2>> $log_file ]; then
    echo "Backup file for the database created at $timestamp" >> $log_file
else
    echo "ERROR Backup file for the database not created at $timestamp" >> $log_file
fi

# Create backup file for the app files
tar -czf app.tar.gz .
echo "Backup file for the app files created at $timestamp" >> $log_file

# Create backup file for the app files and database
tar -czf /home/$user/backup/backup_$timestamp.tar.gz db.sql app.tar.gz
echo "Backup file for the app files and database created at $timestamp" >> $log_file

# Delete db.sql and app.tar.gz files
rm db.sql app.tar.gz
echo "db.sql and app.tar.gz files deleted at $timestamp" >> $log_file

# Delete backup files older than 10 days
find /home/$user/backup/ -type f -mtime +10 -exec rm {} \;
echo "Backup files older than 10 days deleted at $timestamp" >> $log_file
