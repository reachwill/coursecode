self.addEventListener('message', function(e) {
	postMessage(e.data.msg)
})