
import {Component} from "@angular/core";
import {NgModule} from "@angular/core";
import {platformBrowserDynamic} from "@angular/platform-browser-dynamic";
import {BrowserModule} from "@angular/platform-browser";

import {LessonsList} from "./lessons-list.component";

import {lessonsData} from "./lessons";

@Component({
    selector:'app',
    template: `

        <input class="add-lesson" placeholder="Add Lesson"
             #input>

        <lessons-list [lessons]="lessons"></lessons-list>

        `
})
export class App {

  lessons = lessonsData;

}

@NgModule({
    declarations: [App, LessonsList],
    imports: [BrowserModule],
    bootstrap: [App]
})
export class AppModule {

}


platformBrowserDynamic().bootstrapModule(AppModule);
