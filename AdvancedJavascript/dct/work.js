self.addEventListener('message', function (e) {
    var data = e.data;
    switch (data.cmd) {
        case 'start':
            for (i = 0; i < 1000; i++) {
                console.log(i);
            }
            self.postMessage(data.msg);
            break;
        case 'stop':
            self.postMessage(data.msg);
            self.close();
            break;

    }
});
