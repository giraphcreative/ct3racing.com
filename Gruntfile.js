
module.exports = function(grunt) {

    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({

        cssDir: 'library/css',
        scssDir: 'library/scss',
        jsDir: 'library/js',
        jsLibDir: 'library/js/libs',
        jsSrcDir: 'library/js/src',

        // watch for changes and trigger compass, jshint, uglify and livereload
        watch: {
            js: {
                files: '<%= jsDir %>/src/*.js',
                tasks: ['uglify']
            },
            css: {
                files: '<%= scssDir %>/*.scss',
                tasks: ['sass']
            }
        },

        // we use the Sass
        sass: {
            dist: {
                options: {
                    // nested, compact, compressed, expanded
                    style: 'compressed'
                },
                files: {
                    '<%= cssDir %>/login.css': '<%= scssDir %>/login.scss',
                    '<%= cssDir %>/style.css': '<%= scssDir %>/style.scss'
                }
            }
        },

        // uglify to concat & minify
        uglify: {
            js: {
                expand: true,
                files: {
                    '<%= jsDir %>/scripts.js': [
                        '<%= jsLibDir %>/modernizr.js',
                        '<%= jsSrcDir %>/menu.js',
                        '<%= jsSrcDir %>/layout.js',
                        '<%= jsSrcDir %>/magnific.js',
                        '<%= jsSrcDir %>/scroll.js',
                        '<%= jsSrcDir %>/scripts.js',
                    ],
                }
            }
        }

    });

    // register task
    grunt.registerTask('default', ['watch']);
};