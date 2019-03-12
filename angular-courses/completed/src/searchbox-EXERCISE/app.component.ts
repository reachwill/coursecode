import {Component} from '@angular/core';
import {NgModule} from '@angular/core';
import {platformBrowserDynamic} from '@angular/platform-browser-dynamic';
import {BrowserModule} from '@angular/platform-browser';
import {SearchBox} from './search-box/search-box.component';
import {Results} from './results/results.component';
import "rxjs/Rx";
import {LessonsService} from './services/lessons.service';
import { HttpModule } from '@angular/http';

@Component({
  selector: 'app',
  template: `
        <search-box text="Type search here" (searchSubmitted)="doSearch($event)"></search-box>
        <results heading="We have found:" [results]="lessonsService.lessons"></results>
`
})
export class App{

  //results: string;

  constructor(private lessonsService: LessonsService){}

  doSearch(event){
    //this.results = `Display results for ${event.searchTerm}`;
    this.lessonsService.findLessons(event.searchTerm);
  }
}


@NgModule({
  declarations: [App,SearchBox,Results],
  imports: [BrowserModule,HttpModule],
  bootstrap: [App],
  providers:[LessonsService]
})
export class AppModule{}

platformBrowserDynamic().bootstrapModule(AppModule);
