
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";

//import {enableProdMode} from '@angular/core';


@Component({
    selector:'app',
    template: `

          <input value="Type here" #input>{{input.value}}
          <button (click)="onClick()">Click</button>

    `
})
export class App {

  onClick(){
    alert('yeheh');
    debugger;//shows the original ts in browser dev
  }

}


@NgModule({
    declarations: [App],
    imports: [BrowserModule],
    bootstrap: [App]
})
export class AppModule {

}

//enableProdMode();
platformBrowserDynamic().bootstrapModule(AppModule);
