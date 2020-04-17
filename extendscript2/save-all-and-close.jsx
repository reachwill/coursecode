var docs = documents.length;

if (docs < 1) {
    alert('No documents to close');
} else if (confirm('Are you sure?')) {
    for (var i = 0; i < docs; i++) {
        activeDocument.close(SaveOptions.SAVECHANGES);
    }
}
