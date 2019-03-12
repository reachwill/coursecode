import {Component, Input} from '@angular/core';
import {LessonsService} from '../services/lessons.service';

declare const module;//for systemJS

@Component({
  selector: 'results',
  moduleId: module.id,//for systemJS
  templateUrl: 'results.component.html',
  styleUrls: ['results.component.css']
})

export class Results{
  @Input() results:string;
  @Input() heading:string = 'Results';
  constructor(private lessonsService: LessonsService){}

}
