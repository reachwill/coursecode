
import {Component, Input, Output, EventEmitter} from '@angular/core';

declare const module;//for systemJS

@Component({
  selector: 'search-box',
  moduleId: module.id,//for systemJS
  templateUrl: 'search-box.component.html',
  styleUrls: ['search-box.component.css']
})

export class SearchBox{

  @Output('searchSubmitted')//custom event name for use in parent app
  searchOutput = new EventEmitter;

  @Input()
  text:string = 'YEHAH';

  clearInput(input){
    console.log(input);
    input.value='';
  }

  submit(input){
    this.searchOutput.emit({
      searchTerm:input.value
    });
  }


}
