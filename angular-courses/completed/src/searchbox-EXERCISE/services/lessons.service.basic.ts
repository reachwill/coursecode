
import {Injectable} from "@angular/core";
import {Http} from "@angular/http";


@Injectable()
export class LessonsService {

    lessons = [];
    
    constructor(private http: Http) {}

    findLessons(searchTerm){
        this.http.get('/lessons?search=' + searchTerm)
            .map(res => res.json())
            .subscribe(
                lessons => this.lessons = lessons,
                err => console.error(err)
            );
    }
    
}

