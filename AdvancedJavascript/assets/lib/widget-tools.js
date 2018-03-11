(function (a, el) {
    var httpRequest;
    var div = document.createElement('div');
    div.id = 'tools';
    (el == 'body') ? document[el].appendChild(div): document.getElementById(el).appendChild(div);

    var btn = document.createElement('button');
    btn.innerHTML = 'Get Widgets';
    btn.addEventListener('click', function () {
        getWidgetData('data/widget-data2.txt');
    });
    document.getElementById('tools').appendChild(btn);

    div = document.createElement('div');
    div.id = 'dropzone';
    div.addEventListener('drop', drop);
    div.addEventListener('dragover', allowDrop);
    div.addEventListener('dragleave', leave);
    document.getElementById('tools').appendChild(div);

    function allowDrop(ev) {
        ev.preventDefault();
        ev.target.style.borderWidth = '5px';
        ev.target.style.borderColor = 'green';
    }

    function leave(ev) {
        ev.preventDefault();
        ev.target.style.borderWidth = '1px';
        ev.target.style.borderColor = 'black';

    }

    function drag(ev) {
        ev.dataTransfer.setData("id", ev.target.id);
    }

    function drop(ev) {
        WidgetNS.removeElement(ev);
    }

    function getWidgetData(url) {

        if (window.XMLHttpRequest) { // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {}
            }
        }

        if (!httpRequest) {
            alert('Giving up :( Cannot create an XMLHTTP instance');
            return false;
        }
        httpRequest.onreadystatechange = processData;
        httpRequest.open('GET', url);
        httpRequest.send();

    }

    function processData() {
        if (httpRequest.readyState === 4) {
            if (httpRequest.status === 200) {
                var data = (JSON.parse(httpRequest.responseText));
                WidgetNS.DataProcessor.buildWidgets(data);

            } else {
                alert('There was a problem with the request.');
            }
        }
    }

    a.getWidgetData = getWidgetData;
    a.allowDrop = allowDrop;
    a.drag = drag;
    a.drop = drop;
    a.leave = leave;

})(window, 'tools');