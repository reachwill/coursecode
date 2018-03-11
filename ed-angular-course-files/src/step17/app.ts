
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";

// import {RouterModule} from "@angular/router";
// import {routeConfig} from "./router-config";
// import {DashboardHeader} from "./dashboard-header";
// import {PageViewsByBrowserWidget} from "./page-views-by-browser.component";
// import {PageViewsPieChartWidget} from "./page-views-pie-chart.component";
// import {ImpressionsByCountryWidget} from "./impresssions-by-country.component";


@Component({
    selector:'app',
    template: `

  <header class="l-header v-center-parent">
    <img class="v-center" routerLink="home"
        src="https://angular-academy.s3.amazonaws.com/main-logo/main-page-logo-small-hat.png">

  </header>

  <main class="l-main l-sample-app">

    <div>

        <!--create router outlets here-->

    </div>

  </main>

        `
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

platformBrowserDynamic().bootstrapModule(AppModule);
