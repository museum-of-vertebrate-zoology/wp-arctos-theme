# !/bin/bash
echo Updating dependencies ... please wait.
cd arctosdb.org
bower update
echo Minifying ...
java -jar ../yuicompressor.jar bower_components/purl/purl.js -o js/purl.min.js
java -jar ../yuicompressor.jar bower_components/sticky/jquery.sticky.js -o js/sticky.min.js
cd .. 
./run-compile.sh