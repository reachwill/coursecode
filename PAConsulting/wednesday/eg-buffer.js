buf = Buffer.alloc(26);
for (var i = 0 ; i < 26 ; i++) {
  buf[i] = i + 97;
}

// console.log( buf.toString('ascii'));       // outputs: abcdefghijklmnopqrstuvwxyz
// console.log( buf.toString('ascii',0,5));   // outputs: abcde
// console.log( buf.toString('utf8',0,5));    // outputs: abcde
// console.log( buf.toString(undefined,0,5)); // encoding defaults to 'utf8', outputs abcde

//********************************************** */

var json = buf.toJSON(buf);

//console.log(json);
//copy a buffer
var buffer2 = Buffer.alloc(26);
buf.copy(buffer2);
console.log("buffer2 content: " + buffer2.toString());

//********************************************* */

var buffer3 = Buffer.alloc(10);
var buffer3 = buf.slice(0,9);
console.log("buffer3 content: " + buffer3.toString());
console.log(buf);
