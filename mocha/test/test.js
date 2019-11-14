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


//now for Promises - make promise.js
var moduleToTest = require('../promise.js');  // our module
describe('PromiseTest', function () {
    describe('Return from Promise', function () {
        it('should have method getUsers', function () {
            assert.equal(typeof moduleToTest.getUsers, 'function');
        })
        it('should return 1 with a then', async () => {
            const users = 'YEHAH';
            const data = await moduleToTest.getUsers().then((data)=>{assert.equal(data, users);});
        })
        it('should return 1 with an await', async () => {
            const users = 'YEHAH';
            const data = await moduleToTest.getUsers();
            assert.equal(data, users);
        })
        it('should return an array [1,2,3,4]', async () => {
            const array = [1,2,3,4];
            const data = await moduleToTest.getArray();
            assert.deepEqual(data, array);
        })
    })
});