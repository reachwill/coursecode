var choice = prompt('Type PDF or PNG');

var fileName = prompt('What name?');


var doc = app.activeDocument;

//first hide all the layers
for(var i=0 ; i < doc.layers.length ; i++){
    doc.layers[i].visible = false;
}

//now export each layer as a png
for(var i=0 ; i < doc.layers.length ; i++){
    //switch on the visibility of this layer
    doc.layers[i].visible = true;
    //turn OFF the visibility of the last layer we processed
    if(i>0){
        doc.layers[i-1].visible = false;
    }
    //set up the path for the saved PNG
    var fpath = doc.path;


    if(choice == 'PDF'){
        savePDF(fpath, doc.layers[i], i);
    }else if(choice == 'PNG'){
        savePNG(fpath, doc.layers[i], i);
    }
    
}

//now show all the layers
for(var i=0 ; i < doc.layers.length ; i++){
    doc.layers[i].visible = true;
}



function savePNG(fpath, layer, index){
    $.writeln(fpath);
    fpath.changePath(fileName + index + '.png');
    // fpath.changePath(layer.name + '.png');
    var exportObject = new ExportOptionsPNG24();
    exportObject.transparency = true;
    exportObject.horizontalScale = 400;
    exportObject.verticalScale = 400;
    doc.exportFile(fpath, ExportType.PNG24, exportObject);
}

function savePDF(fpath, layer, index){
    fpath.changePath(fileName + index + '.pdf');
    // fpath.changePath(layer.name + '.pdf');
    var exportObject = new PDFSaveOptions();
    exportObject.compatibility = PDFCompatibility.ACROBAT6;
    exportObject.generateThumbnails = true;
    exportObject.preserveEditability = false;
    doc.saveAs(fpath, exportObject);
}