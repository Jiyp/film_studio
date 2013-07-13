var im = require('imagemagick');
var fs = require('fs');
var path = require('path');

var config = require('./config');

var mime_img = ['.jpg', '.jpeg', '.png', '.gif'];
var dirs = [];

var doc_root = config.DOC_ROOT;
var img_source = path.join( doc_root, config.IMG_SOURCE );
var img_dest = path.join( doc_root, config.IMG_DEST );
var rename = config.RENAME;


function resize( src, dest, opts ){
	opts = opts || {};
	var args = {};
	opts.width && (args.width = opts.width);
	opts.height && (args.height = opts.height);
	args.srcPath = src;
	args.dstPath = dest;
    console.log('processing-->' + src);
    im.resize(args, function(err, stdout, stderr){
        if (err) throw err;
        console.log('resized ' + src  + ' to fit within auto * 133');
    });
}

function walk( dir, callback ){
    var count = 0,
        file_arr = [],
        dir_arr = [];
    (function inner(d){
        count++;
        fs.stat( d, function( err, stats ){
            count--;
            if( !err ){
                if( stats.isDirectory() ){
                    count++;
                    dir_arr.push(d);
                    fs.readdir( d, function( err, files ){
                        count--;
                        files.forEach( function( file ){
                            inner(path.join( d, file )); 
                        }); 
                        if( count === 0 ){
                            callback( file_arr, dir_arr );
                        }
                    });
                } else {
                    file_arr.push( d );
                }
                if( count === 0 ){
                    callback( file_arr, dir_arr );
                }
            }
        });
    })(dir);
}

walk(img_source, function(files){
	for( var i = 0, len = files.length; i < len; i++ ){
		//var file = files[i];
        (function(f){
            var extname = path.extname(f);
            if( mime_img.indexOf(extname.toLowerCase()) !== -1 ){
                var dirname = path.dirname(f),
                    basename = path.basename(f),
                    dest = path.join( img_dest, dirname.replace(img_source, ''), basename ),
                    opts = {};
                im.identify(f, function(err, features){
                    if (err) {
                        throw err;
                    }
                    var width = features.width;
                    var height = features.height;
                    if( width > height ){ //横版图片
                        opts.width = 200;
                        opts.height = 133;
                    } else { //竖版图片
                        opts.height = 133;
                    }
                    resize( f, dest, opts );
                });
            }
        })(files[i]);
	}
});
