
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";

import {ColorPicker} from "./color_picker";
import {ColorPreviewer} from "./color_previewer";


@Component({
  selector: 'app',
  template: `


            <!--<color-picker #picker color="red"  (color)="onColor($event)">
            </color-picker>--><!-- stage 1-->



            <!--<color-previewer  color="red"></color-previewer>-->

            <!--<color-previewer  [color]="color"></color-previewer>-->

            <!--<color-picker #picker [color]="color"  (color)="color = $event">
            </color-picker>--><!--stage 2-->

            <!-- FINALLY MODIFY TO BECOME MORE DECALRATIVE-->
            <color-picker #picker color="red"  (color)="previewer.color=$event">
            </color-picker>--><!-- last stage-->



           <color-previewer #previewer ></color-previewer><!-- last stage-->

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
