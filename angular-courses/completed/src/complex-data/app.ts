
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";
import  {Heroes} from './heroes';
import {Hero} from "./hero";



@Component({
    selector: 'app',
    template: `

        <heroes>
            <hero name="Porsche" id="1" [inStock]="true"></hero>
            <hero name="Ferrari" id="2" [inStock]="false"></hero>
        </heroes>

        `
})
export class App {


}

@NgModule({
    declarations: [App,Heroes,Hero],
    imports: [BrowserModule],
    bootstrap: [App]
})
export class AppModule {

}

platformBrowserDynamic().bootstrapModule(AppModule);
