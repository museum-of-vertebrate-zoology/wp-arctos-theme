git fetch purl master
git subtree pull --prefix arctosdb.org/js/purl purl master --squash
java -jar yuicompressor.jar arctosdb.org/js/purl/purl.js arctosdb.org/js/purl.min.js
git fetch picturefill master
git subtree pull --prefix arctosdb.org/js/picturefill picturefill master --squash
copy /y arctosdb.org/js/picturefill/dist/picturefill.min.js arctosdb.org/js/picturefill.min.js
cd arctosdb.org
bower update