//$.write(app.documents.length);

var numDocs = app.documents.length;
for(var i = 0 ; i < numDocs ; i++){
    var thisDoc = app.documents[i];
    $.writeln('File path: ' + thisDoc.path);
    if(thisDoc.path == ''){
        //prompt the user to save the unsaved file
        var file = File.saveDialog('Save file as...');
        thisDoc.saveAs(file);
    }else{
        if(thisDoc.saved == false){
            thisDoc.save();
            thisDoc.saved = true;
        }
    }
}