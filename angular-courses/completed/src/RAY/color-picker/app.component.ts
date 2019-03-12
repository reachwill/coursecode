import {Component} from '@angular/core';
import {NgModule} from '@angular/core';
import {platformBrowserDynamic} from '@angular/platform-browser-dynamic';
import {BrowserModule} from '@angular/platform-browser';
import  {ColorPicker} from './color-picker';
import  {ColorPreviewer} from './color-previewer';

@Component({
  selector: 'app',
  template: `
        <!--<color-picker (colorChanged)="colorChanged($event)"></color-picker>
        <color-previewer [color]="color"></color-previewer>-->

        <color-picker #picker (colorChanged)="previewer.color=$event.color"></color-picker>
        <color-previewer #previewer color="purple"></color-previewer>

`
})
export class App{

  // color:string = '#0f0';
  //
  // colorChanged(color){
  //   console.log(color);
  //   this.color = color;
  // }

}

@NgModule({
  declarations: [App,ColorPicker,ColorPreviewer],
  imports: [BrowserModule],
  bootstrap: [App]
})
export class AppModule{}

platformBrowserDynamic().bootstrapModule(AppModule);
