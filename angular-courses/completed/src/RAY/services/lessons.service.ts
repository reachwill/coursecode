import {Injectable} from '@angular/core';
import {Http} from '@angular/http';
import {xhrHeaders} from './xhr-headers';

@Injectable()
export class LessonsService{
  lessons = [];

  constructor(private http:Http){
    this.loadLessons();
  }


  createLesson(name){
    const lesson = {description:name};
    this.http.post('/lessons',JSON.stringify(lesson),xhrHeaders())
      .subscribe(()=>{this.loadLessons()},err=>console.error(err));
  }


  loadLessons(){
    //this.http.get('/lessons')
      //.map(function(res){res.json()})
      //.subscribe(function(lessons){this.lessons=lessons},function(err){console.error(err)})
    this.http.get('/lessons')
      .map(res=>res.json())
      .subscribe(lessons=>{this.lessons=lessons;console.table(this.lessons)},err=>console.error(err));
  }


}
