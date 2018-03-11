
//NOTE NEW IMPORTS

import {Component, Input, EventEmitter, Output} from "@angular/core";

declare const module;//for system.js

@Component({
  selector: 'search-box',
  moduleId: module.id,//for system.js
  templateUrl: 'search-box.component.html',
  styleUrls: ['search-box.component.css']
})
export class SearchBox {

  //text = 'yehah';// stage 1

  @Input()
  text: string = 'yehah';// stage 2 to make configurable (add as attribute in app.ts)

  //stage 3
  //  @Output()
  //  search = new EventEmitter();
  //
  clear(input) {
    console.log(input);
    input.value = '';
  }
  //
  // onSearch(searchText) {
  //     this.search.emit(searchText);
  // }

}
