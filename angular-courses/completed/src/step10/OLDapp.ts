
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";



@Component({
    selector: 'app',
    template: `

    <input value="Type here" #input>{{input.value}}


        `
})
export class App {

  onClick(){
    alert('yehah');
  }

}



@NgModule({
    declarations: [App],
    imports: [BrowserModule],
    bootstrap: [App]
})
export class AppModule {

}

platformBrowserDynamic().bootstrapModule(AppModule);
