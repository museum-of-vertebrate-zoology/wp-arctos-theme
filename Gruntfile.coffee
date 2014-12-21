#spawn = require('child_process').spawn
#require("load-grunt-tasks")(grunt)

module.exports = (grunt) ->
  # Gruntfile
  # https://github.com/sindresorhus/grunt-shell
  grunt.loadNpmTasks("grunt-shell")
  # https://www.npmjs.com/package/grunt-contrib-coffee
  grunt.loadNpmTasks("grunt-contrib-coffee")
  # https://github.com/gruntjs/grunt-contrib-watch
  grunt.loadNpmTasks("grunt-contrib-watch")
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
      compress:
        command:
          "rm arctosdb.org.zip"
          "7za a -ssw -y -mx9 -tzip arctosdb.org.zip arctosdb.org -mmt"
    compile:
      # Compile coffeescript
      options:
        join: true
        sourceMapDir: "coffee/maps"
        sourceMap: true
      files:
        "arctosdb.org/js":"coffe/*.coffee"
    watch:
      scripts:
        files: ["coffee/*.coffee"]
        tasks: ["compile"]
  # Now the tasks
  grunt.registerTask("default",["watch"])
  grunt.registerTask("compile","Compile coffeescript",["compile"])
  grunt.registerTask("build","Compile, update, and compres",["compile","shell:bower","shell:compress"])
