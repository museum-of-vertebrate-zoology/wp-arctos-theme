@echo off
echo Compiling coffeescript ...
call cake bam
call update_dependencies.bat
cd ..
call rm arctosdb.org.zip
7za a -ssw -y -mx9 -tzip arctosdb.org.zip arctosdb.org -mmt