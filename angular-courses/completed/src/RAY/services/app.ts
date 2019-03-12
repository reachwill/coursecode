
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";
import {HttpModule} from '@angular/http';
import 'rxjs/Rx';
import {LessonsService} from './lessons.service';
import {LessonsList} from "./lessons-list.component";

//import {lessonsData} from "./lessons";

@Component({
    selector:'app',
    template: `

        <input class="add-lesson" placeholder="Add Lesson"
             #input  (keyup.enter)="lessonsService.createLesson(input.value)" >


        <lessons-list [lessons]="lessonsService.lessons"></lessons-list>

        `
})
export class App {

  lessons = [];
  constructor(private lessonsService:LessonsService){}

}

@NgModule({
    declarations: [App, LessonsList],
    imports: [BrowserModule,HttpModule],
    bootstrap: [App],
    providers: [LessonsService]
})
export class AppModule {

}


platformBrowserDynamic().bootstrapModule(AppModule);
