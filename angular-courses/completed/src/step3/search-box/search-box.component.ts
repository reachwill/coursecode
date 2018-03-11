
import {Component, Input, EventEmitter, Output} from "@angular/core";

declare const module;

@Component({
    selector: 'search-box',
    moduleId: module.id,//needed for System.js
    templateUrl: 'search-box.component.html',
    styleUrls: ['search-box.component.css']
})
export class SearchBox {



}
