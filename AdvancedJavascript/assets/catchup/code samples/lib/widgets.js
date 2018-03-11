var WidgetNS = {
        widgetsArray: [],
        removeElement: function (ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("id");

            var toBin = document.getElementById(data);
            ev.target.appendChild(document.getElementById(data));
            ev.target.removeChild(document.getElementById(data));

            var numWidgets = WidgetNS.widgetsArray.length;
            for (var i = 0; i < numWidgets; i++) {
                try {
                    if (WidgetNS.widgetsArray[i].gridItemId == data) {
                        WidgetNS.widgetsArray.splice(i, 1);
                        break;
                    }
                } catch (e) {
                    console.log('not found')
                }

            }



            setTimeout(function () {
                ev.target.innerHTML = '';
            }, 2000);
            ev.target.innerHTML = '<p>Item removed</p>';
            ev.target.style.borderWidth = '1px';
            ev.target.style.borderColor = 'black';

        },
        Widget: function (isDraggable, width, height) {

            function priv_get() {
                return secret;
            }

            //this.member = param;
            var secret = 'secret phrase';
            var that = this;

            this.getSecret = function () {
                return priv_get();
            };


            function priv_get_drag() {
                return isDraggable;
            }

            function priv_set_drag(val) {
                isDraggable = val;
            }

            var isDraggable = isDraggable || false;
            (isDraggable ? this.class = 'draggable' : this.class = '');

            this.getDraggable = function () {
                return priv_get_drag();
            };

            this.setDraggable = function (val) {

                priv_set_drag(val);
                var div = document.getElementById(this.gridItemId);
                div.setAttribute('draggable', val.toString());
                var c = (div.getAttribute('class'));
                (val) ? c += ' draggable': c += '';
                div.setAttribute('class', c);
            };

            this.width = width || 'auto';
            this.height = height || 'auto';
        },
        WidgetType1: function (multipleSelect, selectOptions, title) {
            this.multipleSelect = multipleSelect;
            this.selectOptions = selectOptions;
            this.title = title || 'Untitled';
            WidgetNS.Widget.prototype.registerWidget.call(this, this);
            WidgetNS.Widget.prototype.renderWidgetContainer.call(this, this);
            //Widget.prototype.renderType1Contents();//show difference using call
            WidgetNS.Widget.prototype.renderType1Contents.call(this, this);
        },
        WidgetType2: function (autoComplete, autoCompleteOptions, title) {
            this.autoComplete = autoComplete;
            this.autoCompleteOptions = autoCompleteOptions;
            this.title = title || 'Untitled';
            WidgetNS.Widget.prototype.registerWidget.call(this, this);
            WidgetNS.Widget.prototype.renderWidgetContainer.call(this, this);
        },
        //************** New WidgetTYPE***********************************//
        WidgetType3: function (data, title) {
            this.data = data;
            this.title = title || 'Untitled';
            WidgetNS.Widget.prototype.registerWidget.call(this, this);
            WidgetNS.Widget.prototype.renderWidgetContainer.call(this, this);
            WidgetNS.Widget.prototype.renderType3Contents.call(this, this);
        },
        DataProcessor: {
            buildWidgets: function (data) {


                //STEP 12 -- solve issue of clearing widgets with SEAF
                //Could demo debug technique to solve works twice then fails
                /*(function () {
        var numExisting = WidgetNS.widgetsArray.length;
for (var i = 0; i < numExisting; i++) {
    var toRemove = document.getElementById(WidgetNS.widgetsArray[i].gridItemId);
    //console.log(toRemove.nodeType);
    document.body.removeChild(toRemove)
    if (toRemove.nodeType == 'Node') {

    }
}
WidgetNS.widgetsArray = [];
}());*/

                var numExisting = WidgetNS.widgetsArray.length;
                for (var i = 0; i < numExisting; i++) {
                    var toRemove = document.getElementById(WidgetNS.widgetsArray[i].gridItemId);
                    //console.log(toRemove.nodeType);
                    document.getElementById('widget-section').removeChild(toRemove)
                }
                WidgetNS.widgetsArray = [];


                var numWidgets = data.widgets.length;
                for (var i = 0; i < numWidgets; i++) {
                    switch (data.widgets[i].type) {
                    case 'WidgetType1':
                        var widget = new WidgetNS.WidgetType1(true, data.widgets[i].options, data.widgets[i].title);
                        break;
                    case 'WidgetType2':
                        var widget = new WidgetNS.WidgetType2();
                        break;
                    case 'WidgetType3':
                        var widget = new WidgetNS.WidgetType3(data.widgets[i].chartData, data.widgets[i].title);
                        break;
                    }
                }
            }
        }
    } //end of WidgetNS

WidgetNS.Widget.prototype.registerWidget = function (widget) {
    WidgetNS.widgetsArray.push(widget);
};

WidgetNS.Widget.prototype.renderWidgetContainer = function () {
    //check if widget section has been created - create if necessary
    var widgetSection = document.getElementById('widget-section');
    if (widgetSection == null) {
        widgetSection = document.createElement('section');
        widgetSection.id = 'widget-section';
        document.body.appendChild(widgetSection);
    }

    var div = document.createElement("div");
    div.className = 'gridItem';
    div.setAttribute('draggable', this.getDraggable()); //***************CHANGE HERE
    div.setAttribute('ondragstart', 'drag(event)');
    div.id = 'gridItem' + document.querySelectorAll('.gridItem').length;
    div.style.width = this.width + 'px';
    div.style.height = this.height + 'px';
    this.gridItemId = 'gridItem' + document.querySelectorAll('.gridItem').length;
    document.getElementById('widget-section').appendChild(div);
    if (this.getDraggable()) {
        this.setDraggable(true);
    }
};

WidgetNS.WidgetType1.prototype = new WidgetNS.Widget(true, 300, 300); //What we have set up here is an inheritance chain from Widget to WidgetType1
WidgetNS.WidgetType2.prototype = new WidgetNS.Widget(true, 300, 300); //What we have set up here is an inheritance chain from Widget to WidgetType2
WidgetNS.WidgetType3.prototype = new WidgetNS.Widget(true, 600, 500); //What we have set up here is an inheritance chain from Widget to WidgetType3


WidgetNS.Widget.prototype.renderType1Contents = function () {
    var thisDiv = document.getElementById(this.gridItemId);

    var title = document.createElement("h2");
    title.innerHTML = this.title;
    thisDiv.appendChild(title);

    //Create array of options to be added
    var array = this.selectOptions;

    //Create and append select list
    var selectList = document.createElement("select");
    selectList.id = "mySelect";

    selectList.addEventListener('change', function (e) {
        //e.target.nextSibling.innerHTML = 'You have selected ' + e.target.value;
        var output = e.target.parentNode.querySelectorAll('output');
        output[0].innerHTML = 'You have selected ' + e.target.value;
    });

    thisDiv.appendChild(selectList);

    var output = document.createElement("output");
    thisDiv.appendChild(output);

    //Create and append the options
    for (var i = 0; i < array.length; i++) {
        var option = document.createElement("option");
        option.value = array[i].value;
        option.text = array[i].label;
        selectList.appendChild(option);
    }
};


WidgetNS.Widget.prototype.renderType3Contents = function () {
    //duplicity here
    var thisDiv = document.getElementById(this.gridItemId);

    var title = document.createElement("h2");
    title.innerHTML = this.title;
    thisDiv.appendChild(title);

    var canvas = document.createElement('canvas');
    canvas.id = 'canvasItem' + document.querySelectorAll('canvas').length;
    canvas.className = 'chart';
    thisDiv.appendChild(canvas);

    var json = this.data;

    var numDatasets = json.datasets.length;
    var fetchedDatasets = []
    for (var i = 0; i < numDatasets; i++) {
        fetchedDatasets.push({
            fillColor: json.datasets[i].fill,
            strokeColor: json.datasets[i].stroke,
            data: json.datasets[i].points
        })
    }
    var barChartData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: fetchedDatasets
    }

    var myLine = new Chart(document.getElementById(canvas.id).getContext("2d")).Bar(barChartData);


};