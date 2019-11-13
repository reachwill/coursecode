///START WITH npm install mocha -g --save-dev

describe('Array', function () {
    describe('#indexOf()', function () {
        it('should return -1 when the value is not present', function () {
            assert.equal(-1, [1, 2, 3].indexOf(4)); // 4 is not present in this array so indexOf returns -1
        })
    })
});

var assert = require("assert"); // core module
var C = require('../cash.js');  // our module

// describe('Cash Register', function(){
//   describe('Module C', function(){
//     it('should have a getChange Method', function(){
//       assert.equal(typeof C, 'object');
//       assert.equal(typeof C.getChange, 'function');
//     })
//   })
// });

describe('Cash Register', function () {
    describe('Module C', function () {
        it('should have a getChange Method', function () {
            assert.equal(typeof C, 'object');
            assert.equal(typeof C.getChange, 'function');
        })

        it('getChange(210,300) should equal [50,20,20]', function () {
            assert.deepEqual(C.getChange(210, 300), [50, 20, 20]);
        }); // use .deepEqual for arrays see: http://stackoverflow.com/questions/13225274/

        it('getChange(1487,10000) should equal [5000, 2000, 1000, 500, 10, 2, 1 ]', function () {
            assert.deepEqual(C.getChange(1487, 10000), [5000, 2000, 1000, 500, 10, 2, 1]);
        });
    })
});

// set up coverage and script in package.json
//npm install --save-dev nyc
//add coverage script to package.json
