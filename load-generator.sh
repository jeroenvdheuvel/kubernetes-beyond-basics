#!/bin/sh

while true
do
  curl --silent --write-out '%{http_code}' --silent --output /dev/null http://pi-calculator.localhost/?iterations=1000000
done
