
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {xhrHeaders} from "./xhr-headers";


@Injectable()
export class LessonsService {

    lessons = [];

    constructor(private http: Http) {
        this.loadLessons();
    }

    loadLessons() {
        this.http.get('/lessons')
            .map(res => res.json())
            .subscribe(
                lessons => this.lessons = lessons,
                err => console.error(err)//better debugging
            );
    }

    createLesson(description) {
        console.log("creating lesson ...");
        const lesson = {description,id:Math.random()};
        //const lesson = {description,id:Math.random()};
        this.lessons.push(lesson);
        this.http.post('/lessons', JSON.stringify(lesson), xhrHeaders())
            .subscribe(
                () => {},
                err => console.error(err)
            );
    }

    delete(lessonId) {
      console.log(this.lessons)
        console.log("deleting lesson ..." + lessonId);
        //const index = this.lessons.findIndex(
            //lesson => lesson.id === lessonId
        //);
        let index;
        for (let i in this.lessons) {
           console.log(this.lessons[i].id); //
           var thisId = this.lessons[i].id
           if(lessonId === thisId){
             index = i;
           }
        }
        this.lessons.splice(index, 1);
        this.http.delete(`/lessons/${lessonId}`, xhrHeaders())
            .subscribe(
                () => {},
                err => console.error(err)
            );
    }
}
