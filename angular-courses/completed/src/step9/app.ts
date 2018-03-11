
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";



@Component({
    selector: 'app',
    template: `

            <label>Message:</label>{{ message }}
            <label>Message:</label>{{ 0 == 0 }}
            <label>Message:</label>{{ condition ? 'Yes' : 'No' }}
            <label>Message:</label>{{ calculateValue() }}
            <label>Message:</label>{{ calculatedValue }}
            <label>Message:</label>{{ model?.message || 'Not online' }}

        `
})
export class App {

    message = 'Hello World !';

    condition = true;

    model = {
        message: 'Model Property Value'
    };

    calculateValue(){
      return Math.round(1000.0002);
    }

    get calculatedValue() {
        return "Result of GET";
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
