process.on('exit', function(code) {
    // Following code will never execute.
    setTimeout(function() {
       console.log("This will not run");
    }, 0);
   
    console.log('About to exit with code:', code);
 });
 console.log("Program Ended");


 // Print the current directory
console.log('Current directory: ' + process.cwd());

// Print the process version
console.log('Current version: ' + process.version);

// Print the memory usage
console.log(process.memoryUsage());