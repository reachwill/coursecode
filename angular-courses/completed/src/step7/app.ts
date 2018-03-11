
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";

import {Hero} from "./hero";
import {Heroes} from "./heroes";


@Component({
    selector: 'app',
    template: `

            <heroes></heroes>

        `
})
export class App {


}

@NgModule({
    declarations: [App, Hero, Heroes],
    imports: [BrowserModule],
    bootstrap: [App]
})
export class AppModule {

}

platformBrowserDynamic().bootstrapModule(AppModule);
