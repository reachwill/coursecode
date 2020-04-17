if(documents.length < 1){
    alert('No documents are open!')
}else{
    unembed();
}
alert(app.version)
function unembed(){
    $.writeln(selection);
    //declare a variable that we'll use for some user feedback
    var processedItems = 0;
    for(var i=0 ; i < selection.length ; i++){
        $.writeln(selection[i].typename)
        if(selection[i].typename == 'RasterItem'){
            if(selection[i].embedded == true){
                selection[i].embedded = false;
            }
            processedItems ++;
        }else if(selection[i].typename == 'GroupItem'){
            var theGroupItems = selection[i].rasterItems;
            //now loop thru the group's raster items
            for(var g = 0 ; g < theGroupItems.length ; g++){
                if(theGroupItems[g].embedded == true){
                    theGroupItems[g].embedded = false;
                }
                processedItems ++;
            }//EO for(g=0)
        }//EO if(groupItem)
    }//EO for(i=0)
    alert(processedItems + ' items were unembedded');
}//EO unembed()