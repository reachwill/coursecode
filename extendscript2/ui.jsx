var doc = app.activeDocument;

if (app.documents.length > 0) {

    //start building the UI
    var win = new Window('dialog', 'Export Layers to PNG/PDF');
    win.size = [400, 400];
    var panel1 = win.add('panel', undefined, 'Export Type');
    var radioBtnPNG = panel1.add('radiobutton', undefined, 'PNG');
    var radioBtnPDF = panel1.add('radiobutton', undefined, 'PDF');
    radioBtnPNG.value = true;
    radioBtnPDF.value = true;

    var panel2 = win.add('panel', undefined, 'Scale');
    var scaleTxt = panel2.add('edittext', undefined, '100.00');

    var panel3 = win.add('panel', undefined, 'Filename');
    var fileNameTxt = panel3.add('edittext', undefined, '');
    fileNameTxt.size = [200, 40];

    var panelFooter = win.add('panel');
    var btnOk = panelFooter.add('button', undefined, 'OK');
    btnOk.size = [30, 20];

    win.alignChildren = 'fill';
    panel1.alignChildren = 'fill';
    panelFooter.alignChildren = 'fill';
    panel2.alignChildren = 'fill';
    panel3.alignChildren = 'fill';

    panel1.orientation = 'row';

    radioBtnPNG.helpTip = 'Select this to export PNG files';
    radioBtnPDF.helpTip = 'Select this to export PDF documents';

    //listen for the user clicking the button
    btnOk.onClick = function () {
        processDialogOptions();
    }

    win.show();

}


function processDialogOptions() {
    var choice;
    var scale = scaleTxt.text;
    var fileName = fileNameTxt.text;
    if (radioBtnPNG.value == true) {
        choice = 'PNG';
    } else if (radioBtnPDF.value == true) {
        choice = 'PDF';
    }
    //first hide all the layers
    for (var i = 0; i < doc.layers.length; i++) {
        doc.layers[i].visible = false;
    }

    //now export each layer as a png
    for (var i = 0; i < doc.layers.length; i++) {
        //switch on the visibility of this layer
        doc.layers[i].visible = true;
        //turn OFF the visibility of the last layer we processed
        if (i > 0) {
            doc.layers[i - 1].visible = false;
        }
        //set up the path for the saved PNG
        var fpath = doc.path;
        for(var a=0;a<activeDocument.artboards.length;a++){
            //$.writeln(activeDocument.artboards[a].artboardRect);
            $.write(doc.layers[i]);
        }
        if (choice == 'PDF') {
            savePDF(fpath, doc.layers[i], i, scale, fileName);
        } else if (choice == 'PNG') {
            savePNG(fpath, doc.layers[i], i, scale, fileName);
        }

    }

    //now show all the layers
    for (var i = 0; i < doc.layers.length; i++) {
        doc.layers[i].visible = true;
    }

    win.close();
}


function savePNG(fpath, layer, index, scale, fileName) {
    if(fileName == ''){
        fpath.changePath(layer.name + '.png');
    }else{
        fpath.changePath(fileName + index + '.png');
    }
    var exportObject = new ExportOptionsPNG24();
    exportObject.transparency = true;
    exportObject.horizontalScale = scale;
    exportObject.verticalScale = scale;
    doc.exportFile(fpath, ExportType.PNG24, exportObject);
}

function savePDF(fpath, layer, index, scale, fileName) {
    if(fileName == ''){
        fpath.changePath(layer.name + '.pdf');
    }else{
        fpath.changePath(fileName + index + '.pdf');
    }
    var exportObject = new PDFSaveOptions();
    exportObject.compatibility = PDFCompatibility.ACROBAT6;
    exportObject.generateThumbnails = true;
    exportObject.preserveEditability = false;
    doc.saveAs(fpath, exportObject);
}


