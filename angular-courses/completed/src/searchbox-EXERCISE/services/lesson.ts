import {LessonInterface} from './lesson.interface';

export class Lesson implements LessonInterface{
    description: string;
    id:number;
    constructor(lesson: LessonInterface){
        // this.description = lesson.description;
        // this.id = lesson.id;
        Object.assign(this, lesson);
        return this;
    }

}