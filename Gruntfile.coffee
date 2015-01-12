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
      bam:
        command: "cake bam"
      min:
        command: "cake min"
      bower:
        command: ["cd arctosdb.org", "bower update"].join("&&")
      compress:
        command: ["rm arctosdb.org.zip", "7za a -ssw -y -mx9 -tzip arctosdb.org.zip arctosdb.org -mmt"].join("&&")
    coffee:
      compile:
        options:
          bare: true
          join: true
          sourceMapDir: "coffee/maps"
          sourceMap: true
        files:
          "arctosdb.org/js/c.js":"coffee/*.coffee"
    watch:
      scripts:
        files: ["coffee/*.coffee"]
        tasks: ["coffee:compile","shell:min"]
  # Now the tasks
  grunt.registerTask("default",["watch"])
  grunt.registerTask("compile","Compile coffeescript",["coffee:compile","shell:min"])
  grunt.registerTask("update","Update bower dependencies",["shell:bower"])
  grunt.registerTask("compress","Compress for deployment",["shell:compress"])
  grunt.registerTask "build","Compile, update, and compress", ->
    grunt.task.run("update","compile","compress")
