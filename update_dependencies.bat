@echo off
echo Updating dependencies ... please wait.
cd arctosdb.org
call bower update
echo Minifying ...
java -jar ../yuicompressor.jar bower_components/purl/purl.js -o js/purl.min.js