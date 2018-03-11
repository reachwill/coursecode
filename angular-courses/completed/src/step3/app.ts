
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";

// new
import {SearchBox} from "./search-box/search-box.component";


@Component({
    selector:'app',
    template: `<search-box></search-box>`//new
})
export class App {


}


@NgModule({
    declarations: [App,SearchBox],//new
    imports: [BrowserModule],
    bootstrap: [App]
})
export class AppModule {

}

platformBrowserDynamic().bootstrapModule(AppModule);
