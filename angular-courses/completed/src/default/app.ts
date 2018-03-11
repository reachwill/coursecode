
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";

//import {enableProdMode} from '@angular/core';


@Component({
    selector:'app',
    template: `<h1>Hello World !</h1>`
})
export class App {


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
