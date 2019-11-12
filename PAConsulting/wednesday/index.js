// var fs = require("fs");

// // Asynchronous read
// fs.readFile('input.txt', function (err, data) {
//     if (err) {
//         return console.error(err);
//     }
//     console.log("Asynchronous read: " + data.toString());
// });

// // Synchronous read
// var data = fs.readFileSync('input.txt');
// console.log("Synchronous read: " + data.toString());

// console.log("Program Ended");

// //-------------------------------------------------
// var fs = require("fs");

// // Asynchronous - Opening File
// console.log("Going to open file!");
// fs.open('input.txt', 'r+', function (err, fd) {
//     if (err) {
//         return console.error(err);
//     }
//     console.log("File opened successfully!");
// });

// //---------------------------------------------------
// var fs = require("fs");

// //Stats
// console.log("Going to get file info!");
// fs.stat('input.txt', function (err, stats) {
//     if (err) {
//         return console.error(err);
//     }
//     console.log(stats);
//     console.log("Got file info successfully!");

//     // Check file type
//     console.log("isFile ? " + stats.isFile());
//     console.log("isDirectory ? " + stats.isDirectory());
// });

// //------------------------------------------------------
// var fs = require("fs");
// var buf = Buffer.alloc(1024);

// console.log("Going to open an existing file");
// fs.open('input.txt', 'r+', function (err, fd) {
//     if (err) {
//         return console.error(err);
//     }
//     console.log("File opened successfully!");
//     console.log("Going to read the file");

//     fs.read(fd, buf, 0, buf.length, 0, function (err, bytes) {
//         if (err) {
//             console.log(err);
//         }
//         console.log(bytes + " bytes read");

//         // Print only read bytes to avoid junk.
//         if (bytes > 0) {
//             console.log(buf.slice(0, bytes).toString());
//         }

//         //add as last step--------------------------
//         // Close the opened file.
//         fs.close(fd, function (err) {
//             if (err) {
//                 console.log(err);
//             }
//             console.log("File closed successfully.");
//         });

//     });
// });

// //--------------------------------------------------
var fs = require("fs");
var buf = Buffer.alloc(1024);

//TRUNCATING

console.log("Going to open an existing file");
fs.open('input.txt', 'r+', function (err, fd) {
    if (err) {
        return console.error(err);
    }
    console.log("File opened successfully!");
    console.log("Going to truncate the file after 10 bytes");

    // Truncate the opened file.
    fs.ftruncate(fd, 10, function (err) {
        if (err) {
            console.log(err);
        }
        console.log("File truncated successfully.");
        console.log("Going to read the same file");

        fs.read(fd, buf, 0, buf.length, 0, function (err, bytes) {
            if (err) {
                console.log(err);
            }

            // Print only read bytes to avoid junk.
            if (bytes > 0) {
                console.log(buf.slice(0, bytes).toString());
            }

            // Close the opened file.
            fs.close(fd, function (err) {
                if (err) {
                    console.log(err);
                }
                console.log("File closed successfully.");
            });
        });
    });
});

//------------------------------------------------------------
//delete

// var fs = require("fs");

// console.log("Going to delete an existing file");
// fs.unlink('input.txt', function(err) {
//    if (err) {
//       return console.error(err);
//    }
//    console.log("File deleted successfully!");
// });


//--------------------------------------------------------------
//mkdir
// var fs = require("fs");

// //console.log("Going to create directory tmp/test");

// fs.mkdir('./tmp/test',{recursive: true},function(err) {
//    if (err) {
//       return console.error(err);
//    }
//    console.log("Directory created successfully!");
// });


//--------------------------------------------------------
//readDir
// var fs = require("fs");

// console.log("Going to read directory /tmp");
// fs.readdir("./tmp/",function(err, files) {
//    if (err) {
//       return console.error(err);
//    }
//    files.forEach( function (file) {
//       console.log( file );
//    });
// });

//--------------------------------------------------------
//remove dir
// var fs = require("fs");

// console.log("Going to delete directory /tmp/test");
// fs.rmdir("./tmp/test",function(err) {
//    if (err) {
//       return console.error(err);
//    }
//    console.log("Going to read directory /tmp");
   
// });

console.log(process.cwd())
// Printing to console
process.stdout.write("Hello World!" + "\n");

// Reading passed parameter
process.argv.forEach(function(val, index, array) {
   console.log(index + ': ' + val);
});

// Getting executable path
console.log(process.execPath);

// Platform Information 
console.log(process.platform);