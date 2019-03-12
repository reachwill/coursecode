import {Component, Output, EventEmitter} from '@angular/core';

@Component({
  selector: 'color-picker',
  template: `
    <div class="color-picker">
        <div class="color-sample color-sample-blue" (click)="choose('#00f')"></div>
        <div class="color-sample color-sample-red" (click)="choose('#f00')"></div>
    </div>
  `
})

export class ColorPicker{

  @Output('colorChanged')//custom event name for use in parent app
  colorOutput = new EventEmitter;

  choose(color){

    this.colorOutput.emit({
      color:color,
      emitter:'color-picker'
    });
  }


}
