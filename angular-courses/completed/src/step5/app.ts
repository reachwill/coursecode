
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";

import {ColorPicker} from "./color_picker";
import {ColorPreviewer} from "./color_previewer";


@Component({
  selector: 'app',
  template: `


  <!--STAGE 1-------------------------------------->

  <!--<color-picker (color)="onColor($event)">
  </color-picker>-->

  <!--<color-previewer  color="red"></color-previewer>-->

  <!--STAGE 2---------------------------------------->

  <!--<color-picker (color)="onColor($event)">
  </color-picker>-->

  <!--<color-previewer  [color]="color"></color-previewer>-->

  <!--STAGE 3---------------------------------------->

  <!--<color-picker #picker [color]="color"  (color)="color = $event">
  </color-picker>--><!--stage 2-->

  <!-- FINALLY MODIFY TO BECOME MORE DECALRATIVE-->

  <color-picker #picker color="red"  (color)="previewer.color=$event.color">
  </color-picker><!-- last stage-->

  <color-previewer #previewer></color-previewer>

  <button (click)="picker.reset()">Reset</button>

        `
})
export class App {

  color: string;

  onColor(color) {
    console.log();
    this.color=color;
  }


}



@NgModule({
  declarations: [App, ColorPreviewer, ColorPicker],
  imports: [BrowserModule],
  bootstrap: [App]
})
export class AppModule {

}

platformBrowserDynamic().bootstrapModule(AppModule);
