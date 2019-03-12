
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";
import {xhrHeaders} from "./xhr-headers";
import {LessonInterface} from './lesson.interface';
import {Lesson} from './lesson';


// interface LessonInterface{
//     description: string;
//     id: number;
//     // url: string;
//     // duration:string;
//     // tags: string;
// }

// class Lesson implements LessonInterface{
//     description: string;
//     id:number;
//     constructor(lesson: LessonInterface){
//         // this.description = lesson.description;
//         // this.id = lesson.id;
//         Object.assign(this, lesson);
//         return this;
//     }

// }

// class Lesson {
//     private description: string;
//     private id: number;
//     constructor(lesson){
//         // this.description = lesson.description;
//         // this.id = lesson.id;
//         Object.assign(this, lesson);
//         return this;
//     }

// }

@Injectable()
export class LessonsService {

    lessons = [];
    
    constructor(private http: Http) {}

    findLessons(searchTerm:string){
        this.http.get('/lessons?search=' + searchTerm)
            .map(res => res.json().map((lesson:LessonInterface) => new Lesson(lesson)))
            .subscribe(
                lessons => {
                    this.lessons = lessons;
                    console.log(this.lessons);
                },
                err => console.error(err)
            );
    }

    delete(lessonId){
        //console.log(lessonId);
        let index = this.lessons.findIndex(lesson => lesson.id === lessonId);
        console.log(this.lessons[index]);
        this.lessons.splice(index, 1);
        this.http.delete(`/lessons/${lessonId}`, xhrHeaders())
            .subscribe(
                () => {},
                err => console.error(err)
            );
        
    }
    
}

