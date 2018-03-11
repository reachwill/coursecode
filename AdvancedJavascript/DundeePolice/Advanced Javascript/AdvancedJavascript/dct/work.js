self.addEventListener('message',function(e){
	var data = e.data;
	switch(data.cmd){
		case 'start':
			self.postMessage(data.msg);
			break;
		case 'stop':
			self.postMessage(data.msg);
			self.close();
			break;	
		
	}
});