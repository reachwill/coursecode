

import {Component, Output, EventEmitter, Input} from "@angular/core";
import {BLUE, RED} from "./constants";


@Component({
    selector: 'color-picker',
    template: `

    <div class="color-title" [ngStyle]="{color:color}">Pick a Color:</div>

    <div class="color-picker">
        <div class="color-sample color-sample-blue" (click)="choose('#0f0')"></div>
        <div class="color-sample color-sample-red" (click)="choose('${RED}')"></div>
    </div>

    `//stage 1 then add to app.ts declarations
})
export class ColorPicker {

    @Input()//stage 2
    color:string;

    @Output("color")
    colorOutput = new EventEmitter();

    choose(color) {
        this.color=color;
        this.colorOutput.emit(color);
    }

    reset() {
      this.choose('black'); //first stage in method
        //this.colorOutput.emit('black');
    }

}
