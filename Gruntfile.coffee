spawn = require('child_process').spawn
require("load-grunt-tasks")(grunt)

module.exports = (grunt) ->
  # Gruntfile
  # https://github.com/sindresorhus/grunt-shell
  grunt.loadNpmTasks("grunt-shell")
  # https://www.npmjs.com/package/grunt-contrib-coffee
  grunt.loadNpmTasks("grunt-contrib-coffee") 
  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')
    shell:
      options:
        stderr: false
      test:
        command: "echo test"
      bower:
        command:
          "cd arctosdb.org"
          "bower update"
    build:
      # Build tasks -- compile, update bower, and compress
    compress:
      # Compress the pacakge
    compile:
      # Compile coffeescript

  grunt.registerMultiTask "build", "Compile, update, and compress", ->
    buildTask = spawn("build")
