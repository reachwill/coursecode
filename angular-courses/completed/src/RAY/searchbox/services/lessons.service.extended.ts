
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";

interface LessonInterface{
    description: string;
    id: number;
    // url: string;
    // duration:string;
    // tags: string;
}

class Lesson implements LessonInterface{
    description: string;
    id:number;
    constructor(lesson: LessonInterface){
        this.description = lesson.description;
        //Object.assign(this, lesson);
        return this;
    }

}

@Injectable()
export class LessonsService {

    lessons = [];
    
    constructor(private http: Http) {}

    findLessons(searchTerm:string){
        this.http.get('/lessons?search=' + searchTerm)
            .map(res => res.json().map((lesson: LessonInterface) => new Lesson(lesson)))
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
        //console.log(index);
        
    }
    
}

