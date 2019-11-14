



var moduleToTest = {};     

moduleToTest.getUsers = function(){
    return new Promise((resolve)=>{
        setTimeout(()=>{
            resolve('YEHAH')
        },1000);
    })
}

moduleToTest.getArray = function(){
    return new Promise((resolve)=>{
        setTimeout(()=>{
            resolve([1,2,3,4])
        },1000);
    })
}


module.exports = moduleToTest;